<style>
    /* untuk visi dan misi */
    .bg-green-4:hover {
        background-color: #3c6255 !important;
        /* Ganti dengan warna yang sesuai */
        color: white !important;
    }

    .bg-green-4:hover img {
        border-radius: 50%;
        background-color: white;
    }
</style>


@extends('layouts.main')

@section('content')
    @include('partials.banner')
    {{-- sejarah --}}
    <div class="container-fluid bg-green-3" style="padding: 6em 10em ;">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center justify-content-center flex-column">
                <div class="container text-left" style="">
                    <h1 class="mb-4 text-white" style="font-size: 4em; font-weight: bold;">Sejarah SDIT Al-Qudwah</h1>
                    <p class="text-white mb-5" style="font-size: 1.5em;">SDIT Al Qudwah adalah salah satu sekolah dasar yang
                        berada di bawah naungan Yayasan Al Qudwah Temanggung. Berdiri tahun 2016 untuk mewujudkan cita-cita
                        pendidikan nasional serta mempersiapkan dan mencetak generasi sebagai pemimpin bagi dirinya dan bagi
                        orang lain. Pemimpin bertakwa bagi orang-orang yang bertakwa. </p>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center flex-column">
                <img src="{{ asset('svg/logo-sdit.svg') }}" alt="Deskripsi Gambar"
                    style="height: auto; width: 60%; object-fit: cover;">
            </div>
        </div>
    </div>
    {{-- visi dan misi --}}
    <div class="container-fluid" style="padding: 8em 10em ;">
        <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 5em;">
            <h1 style="font-size: 3.8em; font-weight: bold;">Visi dan Misi SDIT Al-Qudwah</h1>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <div class="container bg-green-4 text-center p-5 rounded-4 " style="height: 78vh">
                    <img class="mb-5" src="{{ asset('svg/vision.svg') }}" alt="" width="100" height="auto">
                    <h2 class="mb-3" style="font-size: 3em; font-weight: bold;">Visi</i></h2>
                    <p class="mb-5" style="font-size: 1.5em;">Terwujudnya lulusan yang
                        berbudi, mandiri, berprestasi, Cinta NKRI dengan Al Quran dan potensi kearifan lokal serta
                        berwawasan lingkungan
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <div class="container bg-green-4 text-center p-5 rounded-4">
                    <img class="mb-5" src="{{ asset('svg/mission.svg') }}" alt="" width="100" height="auto">
                    <h2 class="mb-3" style="font-size: 3em; font-weight: bold;">Misi</i></h2>
                    <ul class="" style="font-size: 1.5em; text-align: left; text-align: justify;">
                        <li class="mb-2">Menciptakan lingkungan belajar yang mendukung perkembangan keterampilan
                            sosial, emosional,
                            fisik, dan intelektual.
                        </li>
                        <li class="mb-2">Melaksanakan pembelajaran yang berpusat pada siswa.
                        </li>
                        <li class="mb-2">Memberikan kesempatan kepada siswa untuk memahami fitroh manusia, fitroh alam
                            semista agar
                            karakter dapat berkembang sesuai nilai-nilai qur’ani.
                        </li>
                        <li class="mb-2">Menyelenggarakan program yang menumbuhkan dan mengembangkan rasa bangga dan
                            perilaku cinta
                            NKRI.
                        </li>
                        <li class="mb-2">Mewujudkan komunitas belajar sekolah.
                        </li>
                        <li class="mb-2">Menciptakan partisipasi aktif seluruh komponen Sekolah, termasuk orang tua,
                            dalam rangka
                            peningkatan kualitas pendidikan.
                        </li>
                        <li class="">Mengembangkan kualitas pendidikan secara terus menerus dalam rangka
                            penjaminan mutu
                            pendidikan sekolah.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Tujuan --}}
    <div class="container-fluid pb-5" style="padding: 0 10em ;">
        <div class="row mb-5">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <div class="container text-left" style="">
                    <h1 class="mb-5 text-green-3" style="font-size: 4em; font-weight: bold;">Tujuan</h1>
                    <ul class="" style="font-size: 1.5em; text-align: left; text-align: justify;">
                        <li class="mb-4">Menjadi sekolah ramah anak
                        </li>
                        <li class="mb-4">Siswa tumbuh dan berkembang sesuai fitroh manusia
                        </li>
                        <li class="mb-4">Siswa memiliki budi pekerti, pengetahuan luas, tanggung jawab dan berbadan sehat
                        </li>
                        <li class="mb-4">Siswa menghafal 2 Juz Al Quran
                        </li>
                        <li class="mb-4">Siswa mencintai diri, keluarga, lingkungan dan alam semesta
                        </li>
                        <li class="mb-4">Siswa dapat mengembangkan potensi yang ada pada diri dan lingkungannya
                        </li>
                        <li class="mb-4">Siswa peduli terhadap lingkungan sekitarnya sesuai fitroh alam</li>
                        <li class="mb-4">Siswa dapat mengakses layanan pendidikan dan sumber belajar dengan mudah dan
                            terjangkau</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <img src="{{ asset('img/foto.png') }}" alt="Deskripsi Gambar"
                    style="height: auto; width: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
@endsection
