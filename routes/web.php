<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\dashboardController;

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

Auth::routes();
