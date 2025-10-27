<?php

use App\Http\Controllers\Pemohon\PemohonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->prefix('admin')->group( function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('pemohon', PemohonController::class);
    /* Route::prefix('pemohon')->group( function () {
        Route::get('/', [PemohonController::class, 'index'])->name('pemohon.index');
        Route::get('/create', [PemohonController::class, 'create'])->name('pemohon.create');
        Route::post('/', [PemohonController::class, 'store'])->name('pemohon.store');
    }); */
});
