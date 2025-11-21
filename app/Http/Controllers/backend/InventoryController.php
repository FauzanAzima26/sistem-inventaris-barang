<?php

namespace App\Http\Controllers\backend;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('backend.inventori.index', compact('barang'));
    }

    public function getData()
    {
        $inventory = Inventory::with('barang')->get();
        return response()->json(['data' => $inventory]);
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
            'barang_id' => 'required|exists:barangs,id',
            'stok'      => 'required|integer|min:0',
        ]);

        $inventory = Inventory::create([
            'uuid'         => Str::uuid(),
            'barang_id'  => $validated['barang_id'],
            'stok'         => $validated['stok'],
        ]);

        return response()->json(['success' => true, 'data' => $inventory]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventory = Inventory::find($id);
        if (!$inventory) {
            return response()->json(['error' => 'inventory tidak ditemukan'], 404);
        }
        return response()->json(['data' => [$inventory]]);
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
        $inventory = Inventory::findOrFail($id);

        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'stok'      => 'required|integer|min:0',
        ]);

        // Update field langsung
        $inventory->barang_id = $validated['barang_id'];
        $inventory->stok      = $validated['stok'];
        $inventory->save();

        return response()->json([
            'success' => true,
            'message' => 'Inventory berhasil diupdate',
            'data' => $inventory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::find($id);
        if (!$inventory) {
            return response()->json(['error' => 'Inventory tidak ditemukan'], 404);
        }

        // Soft delete
        $inventory->delete();

        return response()->json(['success' => true, 'message' => 'Inventory berhasil dihapus']);
    }
}
