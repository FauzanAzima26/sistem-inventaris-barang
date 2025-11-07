<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\userController;
use App\Http\Controllers\backend\barangController;
use App\Http\Controllers\backend\laporanController;
use App\Http\Controllers\backend\kategoriController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\transaksiController;
use App\Http\Controllers\backend\pengaturanController;

Route::get('/', function () {
    return view('frontend/index');
});

Route::resource('dashboard', dashboardController::class)->names('dashboard');
Route::resource('barang', barangController::class)->names('barang');
Route::resource('kategori', kategoriController::class)->names('kategori');
Route::resource('transaksi', transaksiController::class)->names('transaksi');
Route::resource('user', userController::class)->names('user');
Route::resource('laporan', laporanController::class)->names('laporan');
Route::resource('pengaturan', pengaturanController::class)->names('pengaturan');

Auth::routes();
