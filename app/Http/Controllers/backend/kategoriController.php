<?php

namespace App\Http\Controllers\backend;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.kategori.index');
    }

    public function getData()
    {
        $kategori = Categories::all();
        return response()->json(['data' => $kategori]);
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
        ]);

        $kategori = Categories::create([
            'uuid'         => Str::uuid(),
            'nama'         => $validated['nama'],
        ]);

        return response()->json(['success' => true, 'data' => $kategori]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Categories::where('uuid', $id)->first();
        if (!$kategori) {
            return response()->json(['error' => 'kategori tidak ditemukan'], 404);
        }
        return response()->json(['data' => [$kategori]]);
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
        $kategori = Categories::where('uuid', $id)->firstOrFail();

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->fill($request->all());
        $kategori->save();

        return response()->json(['message' => 'Kategori berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Categories::where('uuid', $id)->first();
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }

        // Soft delete
        $kategori->delete();

        return response()->json(['success' => true, 'message' => 'Kategori berhasil dihapus']);
    }
}
