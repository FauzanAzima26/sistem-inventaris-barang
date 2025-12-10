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

Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('inventory/data', [InventoryController::class, 'getData'])->name('inventory.getData');

Route::resource('transaksi', transaksiController::class)->names('transaksi');
Route::get('/api/transaksi', [transaksiController::class, 'getData'])->name('transaksi.getData');

Route::resource('user', userController::class)->names('user');

Route::get('/laporan-stok', [laporanStokController::class, 'index'])->name('laporan.stok');
Route::get('/laporan-stok/pdf', [laporanStokController::class, 'exportPdf'])->name('laporan.stok.pdf');
Route::get('/laporan-stok/data', [laporanStokController::class, 'getData'])->name('laporan.stok.data');


Route::resource('laporan-transaksi', laporanTransaksiController::class)->names('laporan-transaksi');
Route::get('api/laporan-transaksi', [laporanTransaksiController::class, 'getData'])->name('laporan-transaksi.getData');
Route::get('/laporan-transaksi/{uuid}/pdf', [laporanTransaksiController::class, 'exportPdf'])->name('laporan.transaksi.pdf');


Route::resource('pengaturan', pengaturanController::class)->names('pengaturan');

Auth::routes();
