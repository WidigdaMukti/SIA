<style>
    /* untuk visi dan misi */
    .bg-green-4-pointer:hover {
        background-color: #3c6255 !important;
        color: white !important;
    }

    .bg-green-4-pointer:hover img {
        border-radius: 50%;
        background-color: white;
    }

    .bi-play-fill,
    .bi-pause-fill,
    .bi-stop-fill {
        font-size: 1.5em;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 6px;
        border-radius: 5px;
        background: #cccccc;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #3c6255;
        cursor: pointer;
    }
</style>

@extends('layouts.main')

@section('content')
    @include('partials.banner')
    {{-- sejarah --}}
    <div class="container-fluid bg-green-3" style="padding: 7vh 8vw 7vh 8vw;">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center justify-content-center flex-column">
                <div class="container text-left" style="">
                    <h1 class="mb-4 text-white responsive-text-title-1" style="font-weight: bold;">Sejarah SDIT Al-Qudwah</h1>
                    <p class="text-white mb-4 responsive-text-title-6">SDIT Al Qudwah adalah salah satu sekolah dasar yang
                        berada di bawah naungan Yayasan Al Qudwah Temanggung. Berdiri tahun 2016 untuk mewujudkan cita-cita
                        pendidikan nasional serta mempersiapkan dan mencetak generasi sebagai pemimpin bagi dirinya dan bagi
                        orang lain. Pemimpin bertakwa bagi orang-orang yang bertakwa. </p>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center flex-column">
                <img src="{{ asset('svg/logo-sdit.svg') }}" alt="Deskripsi Gambar"
                    style="max-width: 16rem; object-fit: cover;">
            </div>
        </div>
    </div>
    {{-- visi dan misi --}}
    <div class="container-fluid" style="padding: 7vh 8vh ;">
        <div class="d-flex justify-content-center align-items-center responsive-text-title-1 mb-5">
            <h1 style="font-weight: bold;">Visi dan Misi SDIT Al-Qudwah</h1>
        </div>
        <div class="row align-items-start" style="padding-left: 8vh; padding-right: 8vh;">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column mb-5">
                <div class="container bg-green-4 bg-green-4-pointer text-center p-4 rounded-4 " style="height: 92vh">
                    <img class="mb-4" src="{{ asset('svg/vision.svg') }}" alt="" width="100" height="auto">
                    <h2 class="mb-3 responsive-text-title-5" style="font-weight: bold;">Visi</i></h2>
                    <p class="mb-4 responsive-text-head-2">Terwujudnya lulusan yang
                        berbudi, mandiri, berprestasi, Cinta NKRI dengan Al Quran dan potensi kearifan lokal serta
                        berwawasan lingkungan
                    </p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <div class="container bg-green-4 bg-green-4-pointer text-center p-4 rounded-4">
                    <img class="mb-4" src="{{ asset('svg/mission.svg') }}" alt="" width="100" height="auto">
                    <h2 class="mb-3 responsive-text-title-5" style="font-weight: bold;">Misi</i></h2>
                    <ul class="responsive-text-head-2" style="text-align: left; text-align: justify;">
                        <li class="mb-2">Menciptakan lingkungan belajar yang mendukung perkembangan keterampilan sosial,
                            emosional, fisik, dan intelektual.
                        </li>
                        <li class="mb-2">Melaksanakan pembelajaran yang berpusat pada siswa.
                        </li>
                        <li class="mb-2">Memberikan kesempatan kepada siswa untuk memahami fitroh manusia, fitroh alam
                            responsive-text-title-5semista agar
                            karakter dapat berkembang sesuai nilai-nilai qur’ani.
                        </li>
                        <li class="mb-2">Menyelenggarakan program yang menumbuhkan dan mengembangkan rasa bangga dan
                            responsive-text-title-5perilaku cinta NKRI.
                        </li>
                        <li class="mb-2">Mewujudkan komunitas belajar sekolah.
                        </li>
                        <li class="mb-2">Menciptakan partisipasi aktif seluruh komponen Sekolah, termasuk orang tua, dalam
                            rangka peningkatan kualitas pendidikan.
                        </li>
                        <li class="">Mengembangkan kualitas pendidikan secara terus menerus dalam rangka
                            penjaminan mutu pendidikan sekolah.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Tujuan --}}
    <div class="container-fluid pb-4 mb-5" style="padding-left: 8vw; padding-right: 8vw;">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
                <div class="container text-left" style="">
                    <h1 class="mb-4 text-green-3 responsive-text-title-1" style="font-weight: bold;">Tujuan</h1>
                    <ul class="responsive-text-head-2" style="text-align: left; text-align: justify;">
                        <li class="mb-3">Menjadi sekolah ramah anak
                        </li>
                        <li class="mb-3">Siswa tumbuh dan berkembang sesuai fitroh manusia
                        </li>
                        <li class="mb-3">Siswa memiliki budi pekerti, pengetahuan luas, tanggung jawab dan berbadan sehat
                        </li>
                        <li class="mb-3">Siswa menghafal 2 Juz Al Quran
                        </li>
                        <li class="mb-3">Siswa mencintai diri, keluarga, lingkungan dan alam semesta
                        </li>
                        <li class="mb-3">Siswa dapat mengembangkan potensi yang ada pada diri dan lingkungannya
                        </li>
                        <li class="mb-3">Siswa peduli terhadap lingkungan sekitarnya sesuai fitroh alam</li>
                        <li class="mb-3">Siswa dapat mengakses layanan pendidikan dan sumber belajar dengan mudah dan
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

    <div style="padding-left: 7vw; padding-right: 7vw;">
        <div class="container-fluid p-4 pb-3 bg-green-4 d-flex justify-content-between my-5 flex-column rounded-4"
            style="border: 1px solid rgb(236, 236, 236);">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h1 class="responsive-text-title-5" style="font-weight: bold;">Mars SDIT Al Qudwah Ngadirejo</h1>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample"
                    style="background: none; border: none; color: black;">
                    <i id="toggleIcon" class="bi bi-chevron-down" style="font-size:1.5em;"></i>
                </button>
            </div>
            <div class="collapse p-0 responsive-text-normal" id="collapseExample">
                <div class="">
                    <br>
                    <p>Terwujudnya lulusan berbudi mandiri</p>
                    <p>Berprestasi hebat cinta NKRI</p>
                    <p>Dengan Al Quran dan potensi kearifan lokal</p>
                    <p>Yang berwawasan lingkungan</p>
                    <br>
                    <p>Menciptakan suasana belajar yang mendukung</p>
                    <p>Ketrampilan sosial, emosional, fisik, intelektual</p>
                    <p>Agar siswa paham dengan fitroh yangg melekat di dirinya</p>
                    <br>
                    <p>Menumbuhkan, mengembangkan</p>
                    <p>Rasa bangga pada Indonesia tercinta</p>
                    <br>
                    <p>SDIT ALQUDWAH Ngadirejo</p>
                    <p>Terdepan dalam mutu pendidikan</p>
                    <p>SDIT ALQUDWAH Ngadirejo</p>
                    <p>Mencerdaskan kehidupan bangsa</p>
                </div>
                <div class="container-fluid p-0 mt-5">
                    <div class="container-fluid rounded-4 bg-white p-2 d-flex justify-content-center align-content-center"
                        style="border: 1px solid rgb(236, 236, 236);">
                        <div class="d-flex align-items-center">
                            <button id="play" class="btn"><i class="bi bi-play-fill" style=""></i></button>
                            <button id="stop" class="btn me-2"><i class="bi bi-stop-fill"></i></button>
                            <input id="slider" type="range" min="0" max="100" value="0"
                                class="custom-range slider me-4">
                            <span id="duration" class="me-2">00:00</span>
                        </div>
                    </div>
                    <audio id="audio" src="audio/mars.mp3"></audio>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        var audio = document.getElementById('audio');
        var playButton = document.getElementById('play');
        var stopButton = document.getElementById('stop');
        var slider = document.getElementById('slider');
        var duration = document.getElementById('duration');

        playButton.addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
                playButton.innerHTML = '<i class="bi bi-pause-fill"></i>';
            } else {
                audio.pause();
                playButton.innerHTML = '<i class="bi bi-play-fill"></i>';
            }
        });

        stopButton.addEventListener('click', function() {
            audio.pause();
            audio.currentTime = 0;
            playButton.innerHTML = '<i class="bi bi-play-fill"></i>';
        });

        slider.addEventListener('input', function() {
            audio.currentTime = audio.duration * (slider.value / 100);
        });

        audio.addEventListener('timeupdate', function() {
            slider.value = audio.currentTime / audio.duration * 100;
            var minutes = Math.floor(audio.currentTime / 60);
            var seconds = Math.floor(audio.currentTime % 60);
            duration.textContent = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
        });
    </script>

    <script>
        document.getElementById('collapseExample').addEventListener('show.bs.collapse', function() {
            document.getElementById('toggleIcon').className = 'bi bi-chevron-up';
        })

        document.getElementById('collapseExample').addEventListener('hide.bs.collapse', function() {
            document.getElementById('toggleIcon').className = 'bi bi-chevron-down';
        })
    </script>
@endsection
