<?php

use App\Http\Controllers\CBahanbakuController;
use App\Http\Controllers\CMenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPelangganController;
use App\Http\Controllers\CPembelianController;
use App\Http\Controllers\CPenjualanController;
use App\Http\Controllers\CPenukaranController;
use App\Http\Controllers\DashboardController;

// Default route to welcome view
Route::get('/', function () {
    return view('welcome');
});

// Route to home view
Route::get('/home', function () {
    return view('home');
});

// Login view
Route::get('/login', function () {
    return view('login');
});

// Dashboard routes
Route::get('dashboard/home', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard-data', [DashboardController::class, 'getDashboardData'])->name('dashboard.data');

// Additional dashboard-related routes
Route::get('dashboard/menu', [CMenuController::class, 'show'])->name('menu.show');
Route::get('dashboard/customers', [CPelangganController::class, 'show'])->name('pelanggan.show');
Route::get('dashboard/stock', [CBahanbakuController::class, 'show'])->name('bahanBaku.show');
Route::get('dashboard/sales', [CPenjualanController::class, 'show'])->name('penjualan.show');
Route::get('dashboard/purchase', [CPembelianController::class, 'show'])->name('pembelian.show');
Route::get('dashboard/points', [CPenukaranController::class, 'show'])->name('poin.show');
