<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Categories;
use App\Models\TransaksiHeader;
use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['kategori', 'inventory'])->get();
        $kategori = Categories::all();
        $transaksis = TransaksiHeader::with([
            'items.barang'
        ])->latest()->limit(10)->get();

        return view('frontend.index', [
            'barangs' => $barangs,
            'categories' => $kategori,
            'transaksi' => $transaksis
        ]);
    }
}
