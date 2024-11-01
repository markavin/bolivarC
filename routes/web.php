<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPelangganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;

// Route::get('/login', [::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/password/reset', [LoginController::class, 'showResetForm'])->name('password.request');


// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/login', function () {
    return view('login');
});


Route::get('/dashboard/home', function () {
    return view('dashboard/overview');
});

Route::get('dashboard/menu', function () {
    return view('dashboard/menu');
});

Route::get('dashboard/customers', [CPelangganController::class, 'index'])->name('pelanggan.index');

Route::get('dashboard/stock', function () {
    return view('dashboard/bahanbaku');
});
Route::get('dashboard/sales', function () {
    return view('dashboard/penjualan');
});
Route::get('dashboard/purchase', function () {
    return view('dashboard/pembelian');
});
Route::get('dashboard/pointexchange', function () {
    return view('dashboard/penukaranpoin');
});