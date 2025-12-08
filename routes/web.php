<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\userController;
use App\Http\Controllers\backend\BarangController;
use App\Http\Controllers\backend\laporanController;
use App\Http\Controllers\backend\kategoriController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\InventoryController;
use App\Http\Controllers\backend\transaksiController;
use App\Http\Controllers\backend\pengaturanController;
use App\Http\Controllers\backend\laporanStokController;
use App\Http\Controllers\backend\laporanTransaksiController;

Route::get('/', function () {
    return view('frontend/index');
});

Route::resource('dashboard', dashboardController::class)->names('dashboard');

Route::resource('barang', BarangController::class)->names('barang');
Route::get('/api/barang', [BarangController::class, 'getData'])->name('barang.getData');

Route::resource('kategori', kategoriController::class)->names('kategori');
Route::get('/api/kategori', [kategoriController::class, 'getData'])->name('kategori.getData');

Route::resource('inventory', InventoryController::class)->names('inventory');
Route::get('/api/inventory', [InventoryController::class, 'getData'])->name('inventory.getData');

Route::resource('transaksi', transaksiController::class)->names('transaksi');
Route::get('/api/transaksi', [transaksiController::class, 'getData'])->name('transaksi.getData');

Route::resource('user', userController::class)->names('user');

Route::resource('laporan-stok', laporanStokController::class)->names('laporan-stok');
Route::resource('laporan-transaksi', laporanTransaksiController::class)->names('laporan-transaksi');

Route::resource('pengaturan', pengaturanController::class)->names('pengaturan');

Auth::routes();
