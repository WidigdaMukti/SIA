<div class="container-fluid"
    style="display: flex; justify-content: center; align-items: center; height:100vh; background-image: url('svg/carousel/bg2.svg'); background-size: cover;">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
            <img class="img-main-c2 d-none d-md-inline" src="{{ asset('img/bg2-foto.png') }}" alt="">
            <img class="img-circle1-c2 spin d-none d-lg-inline" src="{{ asset('svg/carousel/circle1.svg') }}"
                alt="">
            <img class="img-triangle1-c2 floating-rl d-none d-lg-inline" src="{{ asset('svg/carousel/triangle.svg') }}"
                alt="">
        </div>
        <div class="col-md-6 p-0 d-flex align-items-center">
            <div class="container text-left p-4 m-4">
                <h1 class="text-green-3 responsive-text-title">Penerimaan Peserta Didik Baru (PPDB)</h1>
                <h1 class="mb-4 text-orange responsive-text-title">SDIT AL Qudwah Ngadirejo</h1>
                <p class="text-gray responsive-text-title-6" style="font-weight:600; margin-bottom:4%;">
                    Berkembang, dan
                    Berdaya
                    bersama SDIT Alqudwah Ngadirejo, Pilihan Terbaik untuk Masa Depan Anak-anak, Mari bergabung bersama
                    kami!</p>
                <a href="/ppdb-online" class=" btn btn-lg btn-large text-decoration-none btn-daftar-carousel">Daftar
                    Sekarang</a>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-daftar-carousel {
        background-color: #61876E;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-large.btn-daftar-carousel:hover {
        background-color: #f4a259;
        font-weight: bold;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
    }

    .img-main-c2 {
        height: auto;
        width: 70%;
    }

    .img-circle1-c2 {
        height: auto;
        width: 5%;
        position: absolute;
        top: 85%;
        left: 35%;
    }

    .img-triangle1-c2 {
        height: auto;
        width: 5%;
        position: absolute;
        top: 25%;
        left: 40%;
    }
</style>
