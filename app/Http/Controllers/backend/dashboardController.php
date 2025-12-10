<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Categories;
use App\Models\TransaksiHeader;
use App\Models\Inventory;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik jumlah data
        $barangCount = Barang::count();
        $kategoriCount = Categories::count();
        $transaksiMasukCount = TransaksiHeader::where('jenis_transaksi', 'masuk')->count();
        $transaksiKeluarCount = TransaksiHeader::where('jenis_transaksi', 'keluar')->count();

        $stokMenipis = Inventory::with(['barang.kategori'])
            ->where('stok', '<=', 5)
            ->whereHas('barang')
            ->orderBy('stok', 'asc')
            ->get();

        return view('backend.dashboard.index', compact(
            'barangCount',
            'kategoriCount',
            'transaksiMasukCount',
            'transaksiKeluarCount',
            'stokMenipis'
        ));
    }
}
