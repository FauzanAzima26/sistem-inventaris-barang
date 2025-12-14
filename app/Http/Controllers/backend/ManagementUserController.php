<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagementUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.management-user.index');
    }

    public function getData(Request $request)
    {
        $users = User::select(
            'id',
            'name',
            'email',
            'role',
            'created_at'
        )
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $users
        ]);
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
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required'
        ]);

        // Generate password otomatis
        $nama = Str::slug($request->name, ''); // tanpa spasi
        $passwordPlain = strtolower($nama . '_123'); // contoh

        // Simpan user + password SEKALIGUS
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($passwordPlain),
        ]);

        return response()->json([
            'message'  => 'User berhasil ditambahkan',
            'password' => $passwordPlain // ⚠️ optional
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'data' => $user
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
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|in:admin,editor'
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return response()->json([
            'message' => 'User berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // OPTIONAL: cegah hapus diri sendiri

        if (Auth::id() === $user->id) {
            return response()->json([
                'message' => 'Tidak bisa menghapus akun sendiri'
            ], 422);
        }


        $user->delete();

        return response()->json([
            'message' => 'User berhasil dihapus'
        ]);
    }
}
