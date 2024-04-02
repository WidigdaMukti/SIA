@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid">
        <div class="text-justify" style="padding-left: 8vw; padding-right: 8vw">
            <h1 class="mb-4 responsive-text-title-5" style="font-weight: bold;">Persyaratan PPDB untuk SDIT Al Qudwah
                Ngadirejo
            </h1>
            <ol class="responsive-text-normal">
                <li class="mb-2" style="font-weight: bold;">Fotokopi Akte Kelahiran (2 lembar)
                    <ul>
                        <li style="font-weight: normal;">Akte kelahiran calon siswa harus disertakan dalam bentuk fotokopi
                            sebanyak 2 lembar.</li>
                    </ul>
                </li>
                <li class="mb-2" style="font-weight: bold;">Fotokopi Kartu Keluarga (2 lembar)
                    <ul>
                        <li style="font-weight: normal;">Kartu Keluarga (KK) calon siswa juga harus disertakan dalam bentuk
                            fotokopi sebanyak 2 lembar.
                        </li>
                    </ul>
                </li>
                <li class="mb-2" style="font-weight: bold;">Fotokopi KTP Orang Tua (2 lembar)
                    <ul>
                        <li style="font-weight: normal;">KTP orang tua atau wali yang menjadi penanggung jawab calon siswa
                            harus disertakan dalam bentuk
                            fotokopi sebanyak 2 lembar.</li>
                    </ul>
                </li>
                <li class="mb-2" style="font-weight: bold;">Pas Foto Calon Siswa (3x4 cm)
                    <ul>
                        <li style="font-weight: normal;">Pas foto calon siswa harus berukuran 3x4 cm dan dapat digunakan
                            untuk keperluan administrasi
                            sekolah.
                        </li>
                    </ul>
                </li>
                <li class="mb-2" style="font-weight: bold;">Usia Calon Siswa
                    <ul>
                        <li style="font-weight: normal;">Calon siswa harus berusia minimal 5,5 tahun pada saat mendaftar.
                        </li>
                    </ul>
                </li>
                <li class="mb-2" style="font-weight: bold;">Calon Pindahan
                    <ul>
                        <li style="font-weight: normal;">Calon siswa pindahan diperbolehkan mendaftar selama kuota masih
                            mencukupi.</li>
                    </ul>
                </li>
                <li class="mb-2" style="font-weight: bold;">Biaya Pendaftaran
                    <ul>
                        <li style="font-weight: normal;">Biaya pendaftaran untuk calon siswa dari dalam TKIT Alqudwah adalah
                            Rp 75.000.</li>
                        <li style="font-weight: normal;">Biaya pendaftaran untuk calon siswa dari luar TKIT Alqudwah adalah
                            Rp 100.000.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid py-5 mb-5">
        <div class="container bg-green-4 text-center p-4 rounded-4"
            style="max-width: 86%; border: 1px solid rgb(236, 236, 236);">
            <h1 class="mb-3 responsive-text-title-2" style="font-weight: bold;">Penerimaan Peserta Didik Baru</h1>
            <p class="text-gray mb-4 responsive-text-title-6" style="font-weight: bold;">Saatnya mewujudkan masa depan yang
                lebih
                cerah bersama Sekolah Dasar Islam Terpadu Al-Qudwah</p>
            <a href="/ppdb-online" class="btn btn-lg btn-daftar text-decoration-none"
                style=" display: inline-flex; align-items: center;">
                Daftar Sekarang
            </a>
        </div>
    </div>
@endsection

<style>
    .btn.btn-daftar {
        border: 3px solid #61876E;
        background-color: transparent;
        color: #61876E;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn.btn-daftar:hover {
        background-color: #61876E;
        color: white;
    }
</style>
