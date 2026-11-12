<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopikBidangIlmuController;
use App\Http\Controllers\AuthController;

// Publik: boleh dibuka tanpa login
Route::get('/topik', [TopikBidangIlmuController::class, 'index'])->name('topik.index');

// Hanya untuk yang BELUM login (halaman login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Hanya untuk yang SUDAH login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Di dalam auth: dibatasi berdasarkan peran (Operator & Admin boleh akses edit/update)
    Route::middleware('role:operator,admin')->group(function () {
        Route::get('/topik/create', [TopikBidangIlmuController::class, 'create'])->name('topik.create');
        Route::post('/topik', [TopikBidangIlmuController::class, 'store'])->name('topik.store');
        Route::get('/topik/{id}/edit', [TopikBidangIlmuController::class, 'edit'])
            ->name('topik.edit')
            ->can('update', 'topikBidangIlmu');
        Route::put('/topik/{id}', [TopikBidangIlmuController::class, 'update'])
            ->name('topik.update')
            ->can('update', 'topikBidangIlmu');
    });

    // KHUSUS HAPUS: Hanya boleh diakses oleh 'admin'
    Route::delete('/topik/{id}', [TopikBidangIlmuController::class, 'destroy'])
        ->name('topik.destroy')
        ->can('delete', 'topikBidangIlmu')
        ->middleware('role:admin');
    
    // Contoh Route yang dilindungi oleh Gate 'akses-admin'
    Route::get('/topik/laporan-admin', [TopikBidangIlmuController::class, 'laporan'])
    ->middleware(['auth', 'can:akses-admin'])
    ->name('topik.laporan');
});