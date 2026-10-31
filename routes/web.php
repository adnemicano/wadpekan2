<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RuangController::class, 'index'])->name('home');
Route::post('/ruang', [RuangController::class, 'store'])->name('ruang.store');
Route::get('/daftar-ruang', [RuangController::class, 'daftar'])->name('ruang.daftar');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/ruang/{ruang}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
    Route::put('/ruang/{ruang}', [RuangController::class, 'update'])->name('ruang.update');
    Route::delete('/ruang/{ruang}', [RuangController::class, 'destroy'])->name('ruang.destroy');
});