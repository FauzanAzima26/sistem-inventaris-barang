<?php

namespace App\Http\Controllers\backend;

use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use App\Models\TransaksiHeader;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Barang;

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

            // Insert items
            foreach ($request->barang_id as $i => $barangId) {

                // CEK STOK SAAT INI
                // CEK STOK SAAT INI
                if ($request->jenis_transaksi === 'keluar') {

                    // Ambil detail barang
                    $barang       = Barang::find($barangId);
                    $namaBarang   = $barang->nama ?? "Tidak diketahui";

                    $stokSaatIni  = $this->getStokBarang($barangId);
                    $jumlahKeluar = $request->jumlah[$i];

                    if ($jumlahKeluar > $stokSaatIni) {
                        DB::rollBack();
                        return response()->json([
                            'status'  => 'stok_kurang',
                            'message' => "Stok barang $namaBarang tidak cukup!",
                            'stok'    => $stokSaatIni
                        ], 400);
                    }
                }

                // JIKA VALID → SIMPAN
                $subtotal = $request->jumlah[$i] * $request->harga_satuan[$i];

                TransaksiItem::create([
                    'uuid'         => Str::uuid(),
                    'transaksi_id' => $header->id,
                    'barang_id'    => $barangId,
                    'jumlah'       => $request->jumlah[$i],
                    'harga_satuan' => $request->harga_satuan[$i],
                    'subtotal'     => $subtotal,
                ]);
            }

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
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
        // Validasi
        $request->validate([
            'jenis_transaksi' => 'required',
            'tgl_transaksi' => 'required|date',
            'keterangan' => 'required',
            'barang_id' => 'required|array',
            'jumlah' => 'required|array',
            'harga_satuan' => 'required|array'
        ]);

        DB::beginTransaction();

        try {

            // 🔥 AMBIL TRANSAKSI HEADER (yang benar)
            $transaksi = TransaksiHeader::findOrFail($id);

            // --- UPDATE DATA HEADER ---
            $transaksi->update([
                'jenis_transaksi' => $request->jenis_transaksi,
                'tgl_transaksi' => $request->tgl_transaksi,
                'keterangan' => $request->keterangan,
                'total_item' => array_sum($request->jumlah),
            ]);

            // --- HAPUS ITEM LAMA ---
            $transaksi->items()->delete();

            // --- SIMPAN ITEM BARU ---
            foreach ($request->barang_id as $i => $barangId) {

                if ($request->jenis_transaksi === 'keluar') {

                    $stokSaatIni = $this->getStokBarang($barangId);
                    $jumlahKeluar = $request->jumlah[$i];

                    if ($jumlahKeluar > $stokSaatIni) {
                        DB::rollBack();
                        return response()->json([
                            'status'  => 'stok_kurang',
                            'message' => "Stok barang tidak cukup untuk barang ID $barangId",
                            'stok'    => $stokSaatIni
                        ], 400);
                    }
                }

                TransaksiItem::create([
                    'uuid'         => Str::uuid(),
                    'transaksi_id' => $transaksi->id,
                    'barang_id'    => $barangId,
                    'jumlah'       => $request->jumlah[$i],
                    'harga_satuan' => $request->harga_satuan[$i],
                    'subtotal'     => $request->jumlah[$i] * $request->harga_satuan[$i],
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => true,
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
}
