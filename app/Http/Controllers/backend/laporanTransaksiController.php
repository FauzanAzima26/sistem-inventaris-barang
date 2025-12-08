<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\TransaksiHeader;
use App\Http\Controllers\Controller;

class laporanTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.laporan.transaksi');
    }

    // ====== GET DATA LAPORAN ======
    public function getData()
    {
        $data = TransaksiHeader::with(['items.barang'])->orderBy('id', 'DESC')->get();

        $result = [];

        foreach ($data as $t) {

            // Hitung total subtotal per transaksi
            $totalNilai = $t->items->sum(function ($item) {
                return $item->subtotal;
            });

            $result[] = [
                'uuid'              => $t->uuid,
                'kode_transaksi'    => $t->kode_transaksi,
                'tgl_transaksi'     => $t->tgl_transaksi,
                'jenis_transaksi'   => ucfirst($t->jenis_transaksi),
                'keterangan'        => $t->keterangan,
                'total_item'        => $t->total_item,
                'items'             => $t->items->map(function ($i) {
                    return [
                        'barang'   => $i->barang->nama ?? '-',
                        'jumlah'   => $i->jumlah,
                        'harga'    => $i->harga_satuan,
                        'subtotal' => $i->subtotal,
                    ];
                }),
                'total_nilai'       => $totalNilai
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
    public function show(string $uuid)
    {
        // Cari berdasarkan UUID + load relasi items dan barang
        $transaksi = TransaksiHeader::with([
            'items',
            'items.barang'
        ])->where('uuid', $uuid)->first();

        // Jika tidak ketemu
        if (!$transaksi) {
            return response()->json([
                'status' => false,
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        // Hitung total nilai transaksi (sum subtotal)
        $totalNilai = $transaksi->items->sum(function ($item) {
            return $item->subtotal;
        });

        return response()->json([
            'status' => true,
            'message' => 'Detail transaksi',
            'data' => [
                'uuid'            => $transaksi->uuid,
                'kode_transaksi'  => $transaksi->kode_transaksi,
                'tgl_transaksi'   => $transaksi->tgl_transaksi,
                'jenis_transaksi' => $transaksi->jenis_transaksi,
                'keterangan'      => $transaksi->keterangan,
                'total_item'      => $transaksi->total_item,
                'total_nilai'     => $totalNilai,

                'items' => $transaksi->items->map(function ($i) {
                    return [
                        'barang'   => [
                            'nama'        => $i->barang->nama ?? '-',
                            'kode_barang' => $i->barang->kode_barang ?? '-'
                        ],
                        'jumlah'      => $i->jumlah,
                        'harga_satuan' => $i->harga_satuan,
                        'subtotal'    => $i->subtotal
                    ];
                }),
            ]
        ]);
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
