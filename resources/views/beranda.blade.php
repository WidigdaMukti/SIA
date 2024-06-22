<link rel="stylesheet" href="css/button.css">

@extends('layouts.main')

@section('content')
    @include('partials.carousel')
    {{-- Sambutan Kepsek --}}
    <div class="container-fluid"
        style="display: flex; align-items: center; background-image: url('img/artboard bg.png'); background-size: cover; overflow: auto;">
        <div class="row w-100">
            <div class="col-md-4 d-flex align-items-center justify-content-center flex-column">
                <img src="{{ asset('img/kepsek.png') }}" alt="" class="img-fluid p-4" style="max-width: 90%;"
                    data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="1000">
            </div>
            <div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1000"
                class="col-md-8 text-white responsive-text-normal d-flex align-items-center justify-content-center flex-column">
                <div class="container p-4">
                    <p class="mb-3">Sambutan Kepala sekolah <span style="font-weight: bold;">SDIT Al Qudwah
                            Ngadirejo</span></p>
                    <p class="mb-2" style="font-weight: bold;">Assalamualaikum warahmatullahi wabarakatuh</p>
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
                    <p class="mt-2" style="font-weight: bold;">wassalamualaikum warahmatullahi wabarakatuh</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Program Unggulan --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column pb-2 px-4">
                <div class="container text-left p-5">
                    <h1 class="mb-4 text-green-3 responsive-text-title-1" style="font-weight: bold;">Program Unggulan</h1>
                    <p class="text-gray mb-3 responsive-text-title-6" style="font-weight: bold;">
                        Membentuk Generasi Islami yang Beradab, Mahir dalam Al-Quran, dan Unggul dalam Pengetahuan</p>
                    <a href="/program" class="btn btn-lg btn-large text-decoration-none btn-program">Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-6 p-0">
                <img src="{{ asset('img/tahfidz.JPG') }}" alt="Deskripsi Gambar"
                    style="height: 100%; width: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
    {{-- Informasi Terbaru --}}
    <div class="d-flex justify-content-center my-4 mt-5">
        <h1 class="responsive-text-title-1" style="font-weight: bold;">Informasi Terbaru</h1>
    </div>

    <div class="container-fluid p-2 d-flex justify-content-center">
        <div class="row mb-3 d-flex justify-content-center">
            @foreach($dataBerita as $berita)
            <div class="col mb-4 d-flex justify-content-center me-4">
                <div class="card" style="width: 24rem; height: 32rem;">
                    <div class="img-container rounded-1" style="overflow: hidden;">
                        <a href="{{ route('berita', ['id' => $berita->id]) }}" class="img-link">
                            <img src="{{ asset('storage/' . $berita->gambar_thumbnail) }}" alt="Thumbnail Gambar">
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-gray responsive-text-normal-2">
                            <i class="bi bi-calendar-week me-2" aria-hidden="true"></i> {{ $berita->created_at->format('d F Y') }}
                        </p>
                        <a class="text-decoration-none" href="{{ route('berita', ['id' => $berita->id]) }}">
                            <h2 class="card-title text-truncate mb-2 text-black responsive-text-head"
                                style="font-weight:bold;">{{ $berita->judul }}</h2>
                        </a>
                        <p class="card-text text-gray responsive-text-normal"
                            style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $berita->slug }}
                        </p>
                        {{--  <p class="card-text text-gray responsive-text-normal"
                            style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                            {!! convertMarkdownToHtml($berita->paragraf_1) !!}
                        </p>  --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{--  <div class="container-fluid p-2 d-flex justify-content-center">
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col mb-4 d-flex justify-content-center me-4">
                @include('partials.card.card')
            </div>
            <div class="col mb-4 d-flex justify-content-center me-4">
                @include('partials.card.card')
            </div>
            <div class="col d-flex justify-content-center">
                @include('partials.card.card')
            </div>
        </div>
    </div>  --}}

    <div class="d-flex justify-content-center mb-1">
        <a href="/informasi-umum" class="btn btn-lg btn-large text-decoration-none btn-informasi">Informasi Lainya</a>
    </div>

    {{-- Pendaftaran --}}
    <div class="container-fluid py-5 mb-5">
        <div class="container bg-green-4 text-center p-4 rounded-4"
            style="max-width: 86%; border: 1px solid rgb(236, 236, 236);">
            <h1 class="mb-3 responsive-text-title-2" style="font-weight: bold;">Penerimaan Peserta Didik Baru</h1>
            <p class="text-gray mb-4 responsive-text-title-6" style="font-weight: bold;">Saatnya mewujudkan masa depan yang
                lebih
                cerah bersama Sekolah Dasar Islam Terpadu Al-Qudwah</p>
            <a href="/ppdb-online" class="btn btn-lg btn-large btn-daftar text-decoration-none"
                style=" display: inline-flex; align-items: center;">
                Daftar Sekarang
            </a>
        </div>
    </div>
@endsection

<style>
    .btn-large.btn-program {
        background-color: #61876E;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-large.btn-program:hover {
        background-color: #3c6255;
        color: white;
    }

    .btn-large.btn-informasi {
        background-color: #61876E;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-large.btn-informasi:hover {
        background-color: #3c6255;
        color: white;
    }

    .btn-large.btn-daftar {
        border: 3px solid #61876E;
        background-color: transparent;
        color: #61876E;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-large.btn-daftar:hover {
        background-color: #61876E;
        color: white;
    }
</style>
