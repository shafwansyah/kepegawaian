<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\AbsenController;
use App\Http\Controllers\User\AbsensiController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

// Route::get('/dashboard/{id}', [AbsensiController::class, 'index'])
//     ->middleware(['admin:2']);

// Route::post('/simpan/{id}', [AbsensiController::class, 'masuk']);
// Route::post('/simpan/{id}', [AbsensiController::class, 'keluar']);

Route::get('example', function () {
    return view('pages.example');
});

Route::middleware(['admin:2'])
    ->group(function () {
        Route::get('/dashboard/{id}', [AbsensiController::class, 'index'])->name('dashboard');
        Route::post('/masuk', [AbsensiController::class, 'masuk'])->name('absenMasuk');
        Route::post('/keluar/{id}', [AbsensiController::class, 'keluar'])->name('absenKeluar');
    
});


Route::prefix('admin')
    ->middleware(['admin:1'])
    ->group(function(){
        Route::get('/', [PegawaiController::class, 'index'])->name('dashboard_admin');
        Route::get('role', [RoleController::class, 'index'])->name('role');
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('divisi', DivisiController::class);
        Route::resource('absen', AbsenController::class);
        Route::get('/export', [AbsenController::class, 'export'])->name('exportAbsen');
    });

