<?php

namespace App\Http\Controllers\backend;

use App\Models\Barang;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        return view('backend.inventori.index');
    }

    public function getData()
    {
        $data = Barang::withTrashed(false) // pastikan barang softdelete tidak muncul
            ->select('id', 'nama', 'satuan')
            ->get()
            ->map(function ($barang) {

                // hitung masuk
                $masuk = TransaksiItem::where('barang_id', $barang->id)
                    ->whereHas('header', function ($q) {
                        $q->where('jenis_transaksi', 'masuk');
                    })
                    ->sum('jumlah');

                // hitung keluar
                $keluar = TransaksiItem::where('barang_id', $barang->id)
                    ->whereHas('header', function ($q) {
                        $q->where('jenis_transaksi', 'keluar');
                    })
                    ->sum('jumlah');

                return [
                    'id'        => $barang->id,
                    'nama'      => $barang->nama,
                    'stok'      => max(0, $masuk - $keluar),
                    'satuan'    => $barang->satuan,
                ];
            });

        return response()->json(['data' => $data]);
    }
}
