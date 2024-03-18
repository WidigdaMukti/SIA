<link rel="stylesheet" href="css/button.css">
@extends('layouts.main')

@section('content')
    @include('partials.carousel')
    {{-- Sambutan Kepsek --}}
    <div class="container-fluid"
        style="display: flex; align-items: center; height:800px; background-image: url('img/artboard bg.png'); background-size: cover;">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center justify-content-center flex-column">
                <img src="{{ asset('img/kepsek.png') }}" alt="" style="height: auto; width: 80%;">
            </div>
            <div class="col-md-8 text-white pe-5" style="font-size: 1.5em">
                <div class="container">
                    <p class="mb-5">Sambutan Kepala sekolah <span style="font-weight: bold;">SDIT Al Qudwah
                            Ngadirejo</span></p>
                    <h4 class="mb-4" style="font-weight: bold;">Assalamualaikum warahmatullahi wabarakatuh</h4>
                    <p style="text-align: justify;">Visi sekolah yaitu Terwujudnya lulusan yang berbudi, mandiri,
                        berprestasi,
                        Cinta NKRI dengan Al
                        Quran dan potensi kearifan lokal serta berwawasan lingkungan yang akan diwujudkan dengan
                        Menciptakan
                        lingkungan belajar yang mendukung perkembangan keterampilan sosial, emosional, fisik, dan
                        intelektual. Memberikan kesempatan kepada
                        siswa
                        untuk memahami fitroh manusia, fitroh alam semista agar karakter dapat berkembang sesuai
                        nilai-nilai
                        qur’ani. Menyelenggarakan program yang menumbuhkan dan mengembangkan rasa bangga dan perilaku
                        cinta
                        NKRI. Mewujudkan komunitas belajar sekolah. Menciptakan partisipasi aktif seluruh komponen
                        Sekolah,
                        termasuk orang tua, dalam rangka peningkatan kualitas pendidikan. Mengembangkan kualitas
                        pendidikan
                        secara terus menerus dalam rangka penjaminan mutu pendidikan sekolah.</p>
                    <p style="text-align: justify;">
                        Demikian sekapur sirih tentang SDIT Al Qudwah semoga mampu berkolaborasi dan menginspirasi.
                    </p>
                    <h4 class="mt-4" style="font-weight: bold;">wassalamualaikum warahmatullahi wabarakatuh</h4>
                </div>
            </div>
        </div>
    </div>
    {{-- Program Unggulan --}}
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <div class="container text-left" style="width: 55em;">
                    <h1 class="mb-4 text-green-3" style="font-size: 4em; font-weight: bold;">Program Unggulan</h1>
                    <p class="text-gray mb-5" style="font-size: 2em; font-weight: bold;">Membentuk Generasi Islami yang
                        Beradab,
                        Mahir dalam
                        Al-Quran, dan Unggul dalam Pengetahuan</p>
                    <a href="/program" class="btn-large text-decoration-none"
                        style="background-color: #61876E; color: white;">Selengkapnya</a>
                </div>

            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/tahfidz.JPG') }}" alt="Deskripsi Gambar"
                    style="height: 100%; width: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
    {{-- Informasi Terbaru --}}
    <div class="d-flex justify-content-center py-5">
        <h1 style="font-size: 4em; font-weight: bold;">Informasi Terbaru</h1>
    </div>
    <div class="container-fluid p-2 pb-3" style="display: flex; justify-content: center;">
        <div class="" style="align-content: center">
            <div class="row mb-4">
                <div class="col">
                    @include('partials.card.card')
                </div>
                <div class="col">
                    @include('partials.card.card')
                </div>
                <div class="col">
                    @include('partials.card.card')
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center pb-5">
        <a href="/informasi-umum" class="btn-large text-decoration-none"
            style="background-color: #61876E; color: white;">Informasi Lainya</a>
    </div>
    {{-- Pendaftaran --}}
    <div class="container-fluid py-5 mb-5">
        <div class="container bg-green-4 text-center p-5 rounded-4"
            style="max-width: 79%; border: 1px solid rgb(236, 236, 236);">
            <h1 class="mb-3" style="font-size: 3.8em; font-weight: bold;">Penerimaan Peserta Didik Baru</h1>
            <p class="text-gray mb-5" style="font-size: 1.8em; font-weight: bold;">Saatnya mewujudkan masa depan yang lebih
                cerah bersama Sekolah Dasar Islam Terpadu Al-Qudwah</p>
            <a href="/ppdb-online" class="btn-large text-decoration-none"
                style="background-color: #61876E; color: white; display: inline-flex; align-items: center;">
                Daftar Sekarang
            </a>
        </div>
    </div>
@endsection
