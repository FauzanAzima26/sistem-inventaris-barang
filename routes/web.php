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
use App\Http\Controllers\backend\ManagementUserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('frontend/index');
});

Route::middleware(['auth', RoleMiddleware::class])->group(function () {
    Route::resource('dashboard', dashboardController::class)->names('dashboard');

    Route::get('/api/barang', [BarangController::class, 'getData'])->name('barang.getData');
    Route::get('barang/sampah', [BarangController::class, 'sampah'])->name('barang.sampah');
    Route::post('barang/{id}/restore', [BarangController::class, 'restore'])->name('barang.restore');
    Route::delete('barang/{id}/force-delete', [BarangController::class, 'forceDelete'])->name('barang.forceDelete');
    Route::resource('barang', BarangController::class)->names('barang');

    Route::get('/api/kategori', [kategoriController::class, 'getData'])->name('kategori.getData');
    Route::get('kategori/sampah', [kategoriController::class, 'sampah'])->name('kategori.sampah');
    Route::post('kategori/{id}/restore', [kategoriController::class, 'restore'])->name('kategori.restore');
    Route::delete('kategori/{id}/force-delete', [kategoriController::class, 'forceDelete'])->name('kategori.forceDelete');
    Route::resource('kategori', kategoriController::class)->names('kategori');

    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventory/data', [InventoryController::class, 'getData'])->name('inventory.getData');

    Route::get('/api/transaksi', [transaksiController::class, 'getData'])->name('transaksi.getData');
    Route::get('transaksi/sampah', [transaksiController::class, 'sampah'])->name('transaksi.sampah');
    Route::post('transaksi/{id}/restore', [transaksiController::class, 'restore'])->name('transaksi.restore');
    Route::delete('transaksi/{id}/force-delete', [transaksiController::class, 'forceDelete'])->name('transaksi.forceDelete');
    Route::resource('transaksi', transaksiController::class)->names('transaksi');

    Route::get('/laporan-stok', [laporanStokController::class, 'index'])->name('laporan.stok');
    Route::get('/laporan-stok/pdf', [laporanStokController::class, 'exportPdf'])->name('laporan.stok.pdf');
    Route::get('/laporan-stok/data', [laporanStokController::class, 'getData'])->name('laporan.stok.data');

    Route::resource('laporan-transaksi', laporanTransaksiController::class)->names('laporan-transaksi');
    Route::get('api/laporan-transaksi', [laporanTransaksiController::class, 'getData'])->name('laporan-transaksi.getData');
    Route::get('/laporan-transaksi/{uuid}/pdf', [laporanTransaksiController::class, 'exportPdf'])->name('laporan.transaksi.pdf');

    Route::get('api/managemen-user', [ManagementUserController::class, 'getData'])->name('managemen-user.getdata');
    Route::resource('managemen-user', ManagementUserController::class)->names('managemen-user');
});


Route::resource('pengaturan', pengaturanController::class)->names('pengaturan');

Auth::routes();
