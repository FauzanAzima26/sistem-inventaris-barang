<?php

namespace App\Http\Controllers\backend;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use App\Http\Controllers\Controller;

class laporanStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.laporan.stok');
    }

    public function getData()
    {
        // Ambil barang + kategori (meski kategori sudah dihapus tetap aman)
        $barang = Barang::with(['kategori' => fn($q) => $q->withTrashed()])
    ->get();

        $result = [];

        foreach ($barang as $b) {

            // Hitung stok masuk
            $stokMasuk = TransaksiItem::where('barang_id', $b->id)
                ->whereHas('header', function ($q) {
                    $q->where('jenis_transaksi', 'masuk');
                })
                ->sum('jumlah');

            // Hitung stok keluar
            $stokKeluar = TransaksiItem::where('barang_id', $b->id)
                ->whereHas('header', function ($q) {
                    $q->where('jenis_transaksi', 'keluar');
                })
                ->sum('jumlah');

            $stokAkhir = max(0, $stokMasuk - $stokKeluar);

            $result[] = [
                'kode_barang'   => $b->kode_barang,
                'nama_barang'   => $b->nama,
                'kategori'      => $b->kategori->nama ?? '-',
                'harga_satuan'  => $b->harga_beli,
                'stok_masuk'    => $stokMasuk,
                'stok_keluar'   => $stokKeluar,
                'stok_akhir'    => $stokAkhir,
                'satuan'        => $b->satuan ?? '-',
            ];
        }

        return response()->json(['data' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
