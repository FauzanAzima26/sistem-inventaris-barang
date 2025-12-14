<?php

namespace App\Http\Controllers\backend;

use App\Models\Barang;
use App\Models\Inventory;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use App\Models\TransaksiHeader;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('backend.transaksi.index', compact('barangs'));
    }

    public function getData()
    {
        $transaksi = TransaksiHeader::with('items.barang')->get();
        return response()->json(['data' => $transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    private function getStokBarang($barangId)
    {
        $stokMasuk = TransaksiItem::where('barang_id', $barangId)
            ->whereHas('header', fn($q) => $q->where('jenis_transaksi', 'masuk'))
            ->sum('jumlah');

        $stokKeluar = TransaksiItem::where('barang_id', $barangId)
            ->whereHas('header', fn($q) => $q->where('jenis_transaksi', 'keluar'))
            ->sum('jumlah');

        return $stokMasuk - $stokKeluar;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'tgl_transaksi'   => 'required|date',
            'keterangan'      => 'required|string',
            'barang_id'       => 'required|array',
            'jumlah'          => 'required|array',
            'harga_satuan'    => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            // Hitung total item
            $total_item = array_sum($request->jumlah);

            // Insert Header
            $header = TransaksiHeader::create([
                'jenis_transaksi' => $request->jenis_transaksi,
                'tgl_transaksi'   => $request->tgl_transaksi,
                'keterangan'      => $request->keterangan,
                'total_item'      => $total_item,
            ]);

            // Insert items dan update stok inventory
            foreach ($request->barang_id as $i => $barangId) {

                $jumlah = $request->jumlah[$i];
                $harga_satuan = $request->harga_satuan[$i];

                // Validasi stok jika keluar
                if ($request->jenis_transaksi === 'keluar') {
                    $stokSaatIni = $this->getStokBarang($barangId);
                    if ($jumlah > $stokSaatIni) {
                        DB::rollBack();
                        $barang = Barang::find($barangId);
                        return response()->json([
                            'status'  => 'stok_kurang',
                            'message' => "Stok barang {$barang->nama} tidak cukup!",
                            'stok'    => $stokSaatIni
                        ], 400);
                    }
                }

                // Simpan TransaksiItem
                TransaksiItem::create([
                    'uuid'         => Str::uuid(),
                    'transaksi_id' => $header->id,
                    'barang_id'    => $barangId,
                    'jumlah'       => $jumlah,
                    'harga_satuan' => $harga_satuan,
                    'subtotal'     => $jumlah * $harga_satuan,
                ]);

                // --- UPDATE INVENTORY ---
                $inventory = Inventory::firstOrCreate(
                    ['barang_id' => $barangId],
                    ['stok' => 0]
                );

                if ($request->jenis_transaksi === 'masuk') {
                    $inventory->stok += $jumlah;
                } else {
                    $inventory->stok -= $jumlah;
                    if ($inventory->stok < 0) $inventory->stok = 0;
                }

                $inventory->save();
            }

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = TransaksiHeader::with('items.barang')->find($id);

        if (!$transaksi) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['data' => $transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'tgl_transaksi'   => 'required|date',
            'keterangan'      => 'required|string',
            'barang_id'       => 'required|array',
            'jumlah'          => 'required|array',
            'harga_satuan'    => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            $transaksi = TransaksiHeader::findOrFail($id);

            // Kembalikan stok lama ke inventory sebelum update
            foreach ($transaksi->items as $item) {
                $inventory = Inventory::firstOrCreate(
                    ['barang_id' => $item->barang_id],
                    ['stok' => 0]
                );

                if ($transaksi->jenis_transaksi === 'masuk') {
                    $inventory->stok -= $item->jumlah;
                } else {
                    $inventory->stok += $item->jumlah;
                }

                if ($inventory->stok < 0) $inventory->stok = 0;
                $inventory->save();
            }

            // Update header
            $transaksi->update([
                'jenis_transaksi' => $request->jenis_transaksi,
                'tgl_transaksi'   => $request->tgl_transaksi,
                'keterangan'      => $request->keterangan,
                'total_item'      => array_sum($request->jumlah),
            ]);

            // Hapus item lama
            $transaksi->items()->delete();

            // Simpan item baru dan update stok inventory
            foreach ($request->barang_id as $i => $barangId) {
                $jumlah = $request->jumlah[$i];
                $harga_satuan = $request->harga_satuan[$i];

                // Validasi stok jika keluar
                if ($request->jenis_transaksi === 'keluar') {
                    $stokSaatIni = $this->getStokBarang($barangId);
                    if ($jumlah > $stokSaatIni) {
                        DB::rollBack();
                        $barang = Barang::find($barangId);
                        return response()->json([
                            'status'  => 'stok_kurang',
                            'message' => "Stok barang {$barang->nama} tidak cukup!",
                            'stok'    => $stokSaatIni
                        ], 400);
                    }
                }

                // Simpan item baru
                TransaksiItem::create([
                    'uuid'         => Str::uuid(),
                    'transaksi_id' => $transaksi->id,
                    'barang_id'    => $barangId,
                    'jumlah'       => $jumlah,
                    'harga_satuan' => $harga_satuan,
                    'subtotal'     => $jumlah * $harga_satuan,
                ]);

                // Update stok inventory
                $inventory = Inventory::firstOrCreate(
                    ['barang_id' => $barangId],
                    ['stok' => 0]
                );

                if ($request->jenis_transaksi === 'masuk') {
                    $inventory->stok += $jumlah;
                } else {
                    $inventory->stok -= $jumlah;
                    if ($inventory->stok < 0) $inventory->stok = 0;
                }

                $inventory->save();
            }

            DB::commit();
            return response()->json([
                'status'  => true,
                'message' => 'Transaksi berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari header transaksi
        $transaksi = TransaksiHeader::with('items')->find($id);

        if (!$transaksi) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        DB::beginTransaction();

        try {
            // Hapus semua item terlebih dahulu
            foreach ($transaksi->items as $item) {
                $item->delete();
            }

            // Hapus header
            $transaksi->delete();

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil dihapus']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Ambil semua data yang dihapus (Sampah)
    public function sampah()
    {
        $sampah = TransaksiHeader::onlyTrashed()
            ->get();

        return response()->json([
            'message' => 'Berhasil mengambil data sampah',
            'data' => $sampah
        ]);
    }

    // Restore data dari sampah
    public function restore($id)
    {
        $transaksi = TransaksiHeader::withTrashed()->find($id);

        // ❌ Data tidak ditemukan sama sekali
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Data transaksi tidak ditemukan',
            ], 404);
        }

        // ⚠️ Data belum dihapus
        if (!$transaksi->trashed()) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi ini tidak berada di sampah',
            ], 422);
        }

        // ✅ Restore header
        $transaksi->restore();

        // ✅ Restore item-item
        \App\Models\TransaksiItem::withTrashed()
            ->where('transaksi_id', $transaksi->id)
            ->restore();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil direstore',
        ]);
    }

    // Hapus permanen
    public function forceDelete($id)
    {
        $barang = TransaksiHeader::withTrashed()->findOrFail($id);

        // aman karena tidak dipakai transaksi
        $barang->forceDelete();

        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil dihapus permanen'
        ]);
    }
}
