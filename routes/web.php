<?php

use App\Http\Controllers\CBahanbakuController;
use App\Http\Controllers\CMenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPelangganController;
use App\Http\Controllers\CPembelianController;
use App\Http\Controllers\CPenjualanController;
use App\Http\Controllers\CPenukaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Default route to welcome view
Route::get('/', function () {
    return view('welcome');
});

// Route to home view
Route::get('/home', function () {
    return view('home');
});

// Login view
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/home', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard-data', [DashboardController::class, 'getDashboardData'])->name('dashboard.data');

   
    // Route::middleware(['role:pemilik'])->group(function () {
    //     // Add pemilik specific routes here if needed
    // });

    // Route::middleware(['role:pegawai'])->group(function () {
        Route::get('dashboard/menu', [CMenuController::class, 'show'])->name('menu.show');
        Route::get('dashboard/customers', [CPelangganController::class, 'show'])->name('pelanggan.show');
        Route::get('dashboard/stock', [CBahanbakuController::class, 'show'])->name('bahanBaku.show');
        Route::get('dashboard/sales', [CPenjualanController::class, 'show'])->name('penjualan.show');
        Route::get('dashboard/purchase', [CPembelianController::class, 'show'])->name('pembelian.show');
    //     Route::get('dashboard/points', [CPenukaranController::class, 'show'])->name('poin.show');
    // });
});

// Unauthorized access route
Route::get('/unauthorized', function () {
    return "Anda tidak memiliki izin untuk mengakses halaman ini.";
})->name('unauthorized');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');