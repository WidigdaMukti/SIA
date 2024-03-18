<?php

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

Route::get('/', function () {
    return view('beranda', [
        "title" => "Beranda",
    ]);
});

Route::get('/ppdb-online', function () {
    return view('ppdb', [
        "title" => "PPDB Online",
    ]);
});

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

Route::get('/guru-karyawan', function () {
    return view('guru-karyawan', [
        "title" => "Guru & Karyawan",
    ]);
});

Route::get('/program', function () {
    return view('program', [
        "title" => "Program",
    ]);
});

Route::get('/prestasi', function () {
    return view('prestasi', [
        "title" => "Prestasi",
    ]);
});

Route::get('/ekstrakulikuler', function () {
    return view('ekstrakulikuler', [
        "title" => "Ekstrakulikuler",
    ]);
});

Route::get('/informasi-umum', function () {
    return view('info-umum', [
        "title" => "Informasi Umum",
    ]);
});

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

Route::get('/galeri', function () {
    return view('galeri', [
        "title" => "Galeri",
    ]);
});

Route::get('/ppdb-online', function () {
    return view('ppdb', [
        "title" => "PPDB Online",
    ]);
});

Route::get('/card-content', function () {
    return view('card-content', [
        "title" => "Content",
    ]);
});

Route::get('/detail-galeri', function () {
    return view('detail-galeri', [
        "title" => "Detail Galeri",
    ]);
});
