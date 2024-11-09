<?php

use App\Http\Controllers\CBahanbakuController;
use App\Http\Controllers\CMenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPelangganController;
use App\Http\Controllers\CPembelianController;
use App\Http\Controllers\CPenjualanController;
use App\Http\Controllers\CPenukaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\CLaporanController;
use App\Http\Controllers\CPegawaiController;
use Illuminate\Support\Facades\Auth;

// Redirect root URL to login
Route::redirect('/', '/login');

// Login routes
Route::get('/login', [C_Auth::class, 'showLoginForm'])->name('login');
Route::post('/login', [C_Auth::class, 'login'])->name('login.submit');
Route::post('/logout', [C_Auth::class, 'logout'])->name('logout');

// Routes accessible by both 'pemilik' and 'pegawai'
Route::middleware(['auth:web'])->group(function () {

    // Rute yang bisa diakses oleh semua pengguna yang login
    Route::get('Bolivar/dashboard/home', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard-data', [DashboardController::class, 'getDashboardData'])->name('dashboard.data');

    // Rute khusus untuk pengguna dengan id_role = 2
    Route::group(['middleware' => function ($request, $next) {
        $user = Auth::guard('web')->user();

        if ($user && $user->id_role == 2) {
            return $next($request);
        }

        return redirect()->route('unauthorized')->withErrors([
            'loginError' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'
        ]);
    }], function () {
        Route::get('Bolivar/dashboard/customers', [CPelangganController::class, 'show'])->name('pelanggan.show');
        Route::get('Bolivar/dashboard/customers-create', [CPelangganController::class, 'create'])->name('pelanggan.create');
        Route::post('Bolivar/dashboard/customers-store', [CPelangganController::class, 'store'])->name('pelanggan.store');
        Route::match(['get', 'put'], 'Bolivar/dashboard/customers/{id}/edit', [CPelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::delete('Bolivar/dashboard/customers/{id}', [CPelangganController::class, 'delete'])->name('pelanggan.delete');
        Route::get('Bolivar/dashboard/customers-search', [CPelangganController::class, 'search'])->name('pelanggan.search');

        Route::get('Bolivar/dashboard/menu', [CMenuController::class, 'show'])->name('menu.show');
        Route::get('Bolivar/dashboard/menu-create', [CMenuController::class, 'create'])->name('menu.create');
        Route::post('Bolivar/dashboard/menu-store', [CMenuController::class, 'store'])->name('menu.store');
        Route::match(['get', 'put'], 'Bolivar/dashboard/menu/{id}/edit', [CMenuController::class, 'edit'])->name('menu.edit');
        Route::delete('Bolivar/dashboard/menu/{id}', [CMenuController::class, 'delete'])->name('menu.delete');
        Route::get('Bolivar/dashboard/menu-search', [CMenuController::class, 'search'])->name('menu.search');

        Route::get('Bolivar/dashboard/stock', [CBahanbakuController::class, 'show'])->name('bahanBaku.show');
        Route::get('Bolivar/dashboard/bahanBaku/create', [CBahanbakuController::class, 'create'])->name('stocks.create');
        Route::get('/dashboard/bahanBaku/edit/{id}', [CBahanbakuController::class, 'edit'])->name('stocks.edit');
        Route::post('Bolivar/dashboard/bahanBaku/store', [CBahanbakuController::class, 'store'])->name('stocks.store');
        Route::put('/dashboard/bahanBaku/update/{id}', [CBahanbakuController::class, 'update'])->name('stocks.update');
        Route::delete('/dashboard/bahanBaku/{id}', [CBahanbakuController::class, 'delete'])->name('stocks.delete');

        Route::get('Bolivar/dashboard/sales', [CPenjualanController::class, 'show'])->name('penjualan.show');
        Route::get('Bolivar/dashboard/purchase', [CPembelianController::class, 'show'])->name('pembelian.show');
        Route::get('Bolivar/dashboard/points', [CPenukaranController::class, 'show'])->name('poin.show');
    });

    // Rute khusus untuk pengguna dengan id_role = 1
    Route::group(['middleware' => function ($request, $next) {
        $user = Auth::guard('web')->user();

        if ($user && $user->id_role == 1) {
            return $next($request);
        }

        return redirect()->route('unauthorized')->withErrors([
            'loginError' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'
        ]);
    }], function () {
        Route::get('Bolivar/dashboard/employee', [CPegawaiController::class, 'show'])->name('pegawai.show');
        Route::get('Bolivar/dashboard/employee-create', [CPegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('Bolivar/dashboard/employee-store', [CPegawaiController::class, 'store'])->name('pegawai.store');
        Route::match(['get', 'put'], 'Bolivar/dashboard/employee/{id}/edit', [CPegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::delete('Bolivar/dashboard/employee/{id}', [CPegawaiController::class, 'delete'])->name('pegawai.delete');
        Route::get('Bolivar/dashboard/employee-search', [CPegawaiController::class, 'search'])->name('pegawai.search');

        Route::get('Bolivar/dashboard/reports', [CLaporanController::class, 'getLaporan'])->name('laporan.index');
        Route::get('/laporan-data', [CLaporanController::class, 'getgrafikdata'])->name('laporan.data');
        Route::get('/laporan/export-excel', [CLaporanController::class, 'exportExcel'])->name('laporan.exportExcel');
    });
});

// Unauthorized access route
Route::get('/unauthorized', function () {
    return view('auth.unauthorized');
})->name('unauthorized');
