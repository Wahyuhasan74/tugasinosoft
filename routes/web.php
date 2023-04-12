<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

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

Route::name('Kelas')->prefix('Kelas')->group(function() 
{
    Route::get('/', [KelasController::class, 'index']);
    Route::get('/listKelas', [KelasController::class, 'ListKelas']);
    Route::get('/detailKelas/{namaKelas}', [KelasController::class, 'DetailKelas']);
    Route::post('/tambahKelas', [KelasController::class, 'TambahKelas']);
    Route::post('/updateKelas', [KelasController::class, 'UpdateKelas']);
});

Route::name('Student')->prefix('Student')->group(function() 
{
    Route::get('/', [SiswaController::class, 'index']);
    Route::get('/listSiswa', [SiswaController::class, 'ListSiswa']);
    Route::get('/detailSiswa/{noInduk}', [SiswaController::class, 'DetailSiswa']);
    Route::get('/detailNilaiSiswa/{noInduk}', [SiswaController::class, 'DetailNilaiSiswa']);
    Route::post('/updateNilaiSiswa', [SiswaController::class, 'UpdateNilaiSiswa']);
    // Route::post('/tambahSiswa', [SiswaController::class, 'TambahSiswa']);
});