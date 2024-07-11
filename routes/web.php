<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\GuruStaffController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\breadcrumbController;
use App\Http\Controllers\PdfExportController;
use App\Http\Controllers\PpdbController;
use App\Models\Prestasi;
use App\Models\Program;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('beranda', [
//         "title" => "Beranda",
//     ]);
// });

Route::get('/', [BeritaController::class, 'index'])->name('Beranda');

Route::get('/guru-karyawan', [GuruStaffController::class, 'index']);

Route::get('/program', [ProgramController::class, 'index'])->name('Program');
Route::get('/program/{id}', [ProgramController::class, 'indexContentProgram'])->name('program');

Route::get('/prestasi', [PrestasiController::class, 'index'])->name('Prestasi');
Route::get('/prestasi/{id}', [PrestasiController::class, 'indexContentPrestasi'])->name('prestasi');

Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('Ekstrakulikuler');
Route::get('/ekstrakulikuler/{id}', [EkstrakulikulerController::class, 'indexContentEkskul'])->name('ekskul');

Route::get('/informasi', [BeritaController::class, 'infoUmum'])->name('info-umum');
Route::get('/informasi/{id}', [BeritaController::class, 'indexContentBerita'])->name('berita');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('galeri.show');



Route::get('/ppdb-online', function () {
    return view('ppdb', [
        "title" => "PPDB Online",
    ]);
});

Route::post('/ppdb-online', [PpdbController::class, 'store'])->name('ppdb.store');

Route::get('/tentang-kami', function () {
    return view('tentang', [
        "title" => "Tentang Kami",
    ]);
});

Route::get('/yayasan', function () {
    return view('yayasan', [
        "title" => "Yayasan",
    ]);
});

// Route::get('/guru-karyawan', function () {
//     return view('guru-karyawan', [
//         "title" => "Guru & Karyawan",
//     ]);
// });

// Route::get('/program', function () {
//     return view('program', [
//         "title" => "Program",
//     ]);
// });

// Route::get('/prestasi', function () {
//     return view('prestasi', [
//         "title" => "Prestasi",
//     ]);
// });

// Route::get('/ekstrakulikuler', function () {
//     return view('ekstrakulikuler', [
//         "title" => "Ekstrakulikuler",
//     ]);
// });

// Route::get('/informasi-umum', function () {
//     return view('info-umum', [
//         "title" => "Informasi Umum",
//     ]);
// });

Route::get('/informasi-ppdb', function () {
    return view('info-ppdb', [
        "title" => "Informasi PPDB",
    ]);
});

Route::get('/sistem-informasi', function () {
    return view('sistem-informasi', [
        "title" => "Sistem Informasi",
    ]);
});

// Route::get('/galeri', function () {
//     return view('galeri', [
//         "title" => "Galeri",
//     ]);
// });

// Route::get('/card-content', function () {
//     return view('card-content', [
//         "title" => "Content",
//     ]);
// });

// Route::get('/detail-galeri', function () {
//     return view('content.detail-galeri', [
//         "title" => "Detail Galeri",
//     ]);
// });

Route::get('/download/{id}', [PdfExportController::class, 'exportPdf'])->name('export.pdf');
Route::get('/download/{id}', [PdfExportController::class, 'downloadPdf'])->name('export.pdf');
Route::get('/pdf-export', [PdfExportController::class, 'index'])->name('pdf.export');
Route::get('/pdf/{id}', [PdfExportController::class, 'showPdf'])->name('pdf.show-raports');



