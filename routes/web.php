<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;


Route::get('/daftar-ruang', [RuangController::class, 'daftar'])->name('ruang.daftar');

// blum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.proses');
});

// dah login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Gate
    Route::get('/', [RuangController::class, 'index'])
        ->can('tambah-ruang')
        ->name('home');

    Route::post('/ruang', [RuangController::class, 'store'])
        ->can('tambah-ruang')
        ->name('ruang.store');

    Route::middleware('role:admin,petugas')->group(function () {
        Route::get('/ruang/{ruang}/edit', [RuangController::class, 'edit'])
            ->name('ruang.edit')
            ->can('update', 'ruang');

        Route::put('/ruang/{ruang}', [RuangController::class, 'update'])
            ->name('ruang.update')
            ->can('update', 'ruang');
    });

    Route::delete('/ruang/{ruang}', [RuangController::class, 'destroy'])
        ->name('ruang.destroy')
        ->middleware('role:admin')
        ->can('delete', 'ruang');
});