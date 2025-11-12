<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Storage;
use App\Models\Barang;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'nama'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'kategori_id'  => 'required|exists:categories,id',
            'jumlah_barang' => 'required|integer|min:0',
            'harga'        => 'required|numeric|min:0',
            'satuan'       => 'required|string|max:20',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = 'default.jpg';  // Default jika tidak ada file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images', $filename, 'public');  // Gunakan Storage, bukan public_path
        }

        $barang = Barang::create([
            'uuid'         => Str::uuid(),
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
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
        return response()->json(['data' => [$barang]]);
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
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:categories,id',
            'jumlah_barang' => 'required|integer',
            'harga' => 'required|numeric',
            'satuan' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Opsional: nullable berarti boleh kosong/tidak dikirim
        ]);

        // Update field lain
        $barang->fill($request->except('image'));

        // Hanya update image jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada (konsisten dengan Storage)
            if ($barang->image && $barang->image !== 'default.jpg' && Storage::disk('public')->exists('images/' . $barang->image)) {
                Storage::disk('public')->delete('images/' . $barang->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images', $filename, 'public');
            $barang->image = $filename;
        }
        // Jika tidak ada file baru, $barang->image tetap seperti lama

        $barang->save();

        return response()->json(['message' => 'Barang berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }

        // Soft delete
        $barang->delete();

        return response()->json(['success' => true, 'message' => 'Barang berhasil dihapus']);
    }
}
