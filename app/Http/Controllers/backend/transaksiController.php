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
