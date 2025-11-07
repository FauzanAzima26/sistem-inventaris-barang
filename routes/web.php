<?php

use App\Http\Controllers\backend\barangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboardController;

Route::get('/', function () {
    return view('frontend/index');
});

Route::resource('dashboard', dashboardController::class)->names('dashboard');
Route::resource('barang', barangController::class)->names('barang');

Auth::routes();
