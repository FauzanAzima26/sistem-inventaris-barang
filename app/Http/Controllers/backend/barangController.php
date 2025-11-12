<?php

namespace App\Http\Controllers\backend;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('backend.barang.index', compact('categories'));
    }

    public function getData()
    {
        $barang = Barang::with('kategori')->get();
        return response()->json(['data' => $barang]);
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
        $validated = $request->validate([
            'kode_barang'  => 'required|unique:barangs,kode_barang|max:50',
            'nama'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'kategori_id'  => 'required|exists:categories,id',
            'jumlah_barang' => 'required|integer|min:0',
            'harga'        => 'required|numeric|min:0',
            'satuan'       => 'required|string|max:20',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        } else {
            $filename = 'default.jpg';
        }

        $barang = Barang::create([
            'uuid'         => Str::uuid(),
            'kode_barang'  => $validated['kode_barang'],
            'nama'         => $validated['nama'],
            'deskripsi'    => $validated['deskripsi'],
            'kategori_id'  => $validated['kategori_id'],
            'jumlah_barang' => $validated['jumlah_barang'],
            'harga'        => $validated['harga'],
            'satuan'       => $validated['satuan'],
            'image'        => $filename,
        ]);

        return response()->json(['success' => true, 'data' => $barang]);
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
