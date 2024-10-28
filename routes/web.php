<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});