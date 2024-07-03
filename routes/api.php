<?php

use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalMapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\RaportSiswaController;
use App\Models\AbsensiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/login', 'login')->name('api.login');
    Route::delete('/logout', 'logout')->middleware('auth:sanctum')->name('api.logout');
});


Route::controller(RaportSiswaController::class)->middleware('auth:sanctum')->group(function() {
    Route::get('/raport-siswa',  'getRaportBySiswa')->name('api.siswa.getRaportSiswa');
    Route::get('raport-siswa/{id}', 'getRaportBySiswaId')->name('api.siswa.getRaportSiswaId');
});

Route::controller(NilaiController::class)->middleware('auth:sanctum')->group(function() {
    Route::get('/nilai-siswa', 'getNilaiBySiswa')->name('api.siswa.getNilaiSiswa');
    Route::get('/nilai-siswa/{id}', 'getNilaiBySiswaId')->name('api.siswa.getNilaiSiswaId');
});

Route::controller(AbsensiSiswaController::class)->middleware('auth:sanctum')->group(function() {
    Route::get('/absensi-siswa', 'getAbsensiSiswaByUser')->name('api.siswa.getAbsenSiswa');
    Route::get('/absensi-siswa/{id}', 'getAbsenBySiswaId')->name('api.siswa.getAbsenSiswaID');
});

Route::controller(JadwalMapelController::class)->middleware('auth:sanctum')->group(function() {
    Route::get('/jadwal-kelas', 'getJadwalMapelKelas')->name('api.siswa.getJadwalKelas');
    Route::get('/jadwal-kelas-siswa', 'getJadwalMapelKelasBySiswa')->name('api.siswa.getJadwalKelasSiswa');
});
