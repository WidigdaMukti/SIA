<link rel="stylesheet" href="css/button.css">

@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid p-2 pb-5 mb-1" style="font-size: 150%">
        <div class="text-justify pb-5" style="padding-left: 10.5%; padding-right: 10.5%">
            <h1 class="mb-5" style="font-size: 2vw; font-weight: bold;">Persyaratan PPDB untuk SDIT Al Qudwah Ngadirejo
            </h1>
            <ol>
                <li>Fotokopi Akte Kelahiran (2 lembar)
                    <ul>
                        <li>Akte kelahiran calon siswa harus disertakan dalam bentuk fotokopi sebanyak 2 lembar.</li>
                    </ul>
                </li>
                <li>Fotokopi Kartu Keluarga (2 lembar)
                    <ul>
                        <li>Kartu Keluarga (KK) calon siswa juga harus disertakan dalam bentuk fotokopi sebanyak 2 lembar.
                        </li>
                    </ul>
                </li>
                <li>Fotokopi KTP Orang Tua (2 lembar)
                    <ul>
                        <li>KTP orang tua atau wali yang menjadi penanggung jawab calon siswa harus disertakan dalam bentuk
                            fotokopi sebanyak 2 lembar.</li>
                    </ul>
                </li>
                <li>Pas Foto Calon Siswa (3x4 cm)
                    <ul>
                        <li>Pas foto calon siswa harus berukuran 3x4 cm dan dapat digunakan untuk keperluan administrasi
                            sekolah.
                        </li>
                    </ul>
                </li>
                <li>Usia Calon Siswa
                    <ul>
                        <li>Calon siswa harus berusia minimal 5,5 tahun pada saat mendaftar.</li>
                    </ul>
                </li>
                <li>Calon Pindahan
                    <ul>
                        <li>Calon siswa pindahan diperbolehkan mendaftar selama kuota masih mencukupi.</li>
                    </ul>
                </li>
                <li>Biaya Pendaftaran
                    <ul>
                        <li>Biaya pendaftaran untuk calon siswa dari dalam TKIT Alqudwah adalah Rp 75.000.</li>
                        <li>Biaya pendaftaran untuk calon siswa dari luar TKIT Alqudwah adalah Rp 100.000.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid py-5 mb-5">
        <div class="container bg-green-4 text-center p-5 rounded-4"
            style="max-width: 79%; border: 1px solid rgb(236, 236, 236);">
            <h1 class="mb-3" style="font-size: 2.8vw; font-weight: bold;">Penerimaan Peserta Didik Baru</h1>
            <p class="text-gray mb-5" style="font-size: 1.2vw; font-weight: bold;">Saatnya mewujudkan masa depan yang lebih
                cerah bersama Sekolah Dasar Islam Terpadu Al-Qudwah</p>
            <a href="/ppdb-online" class="btn-large text-decoration-none"
                style="background-color: #61876E; color: white; display: inline-flex; align-items: center;">
                Daftar Sekarang
            </a>
        </div>
    </div>
@endsection

<style>
    ol>li {
        margin-bottom: 1%;
        font-weight: bold;
    }

    ul>li {
        font-weight: normal;
    }
</style>
