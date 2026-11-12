<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TopikBidangIlmuController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\TopikBidangIlmuController as TopikController;
Route::get('/', [TopikController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('topik', TopikBidangIlmuController::class);

Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect";
    } catch (\Exception $e) {
        return "DB gagal connect " . $e->getMessage();
    }
});

Route::get('/tes-data', function () {
    try {
        $data = TopikBidangIlmu::all();
        return response()->json($data);
    } catch (\Exception $e) {
        return "Gagal mengambil data: " . $e->getMessage();
    }
});
