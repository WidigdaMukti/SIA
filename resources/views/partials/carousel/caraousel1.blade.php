<div class="container-fluid"
    style="display: flex; justify-content: center; align-items: center; height:100vh; background-image: url('svg/carousel/bg1.svg'); background-size: cover;">
    <div class="row">
        <div class="col-md-6 p-0 d-flex align-items-center">
            <div class="container text-left" style="width:85%; margin-right: 0; padding-right:0;">
                <h1 class="text-green-3">Selamat
                    Datang Di Website</h1>
                <h1 class="mb-4 text-orange">SDIT AL Qudwah Ngadirejo</h1>
                <p class="text-gray" style="font-size:2em; font-weight:600;">SDIT Al Qudwah merupakan sekolah yang
                    berkomitmen untuk
                    mengembangkan
                    fitrah anak-anak dengan
                    budi pekerti yang baik, pengetahuan yang luas, dan memiliki pemahaman Al-Quran.</p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
            <img class="img-main-c1" src="{{ asset('img/bg1-foto.png') }}" alt="">
            <img class="img-circle1-c1" src="{{ asset('svg/carousel/circle1.svg') }}" alt="">
            <img class="img-circle2-c1" src="{{ asset('svg/carousel/circle2.svg') }}" alt="">
            <img class="img-triangle1-c1" src="{{ asset('svg/carousel/triangle.svg') }}" alt="">
        </div>
    </div>
</div>

<style>
    h1 {
        font-size: 4.5em;
        font-weight: 800;

    }

    .img-main-c1 {
        height: auto;
        width: 80%;
        top: 50%;
        right: 50%;
    }

    .img-circle1-c1 {
        height: auto;
        width: 5%;
        position: absolute;
        top: 65%;
        right: 35%;
    }

    .img-circle2-c1 {
        height: auto;
        width: 5%;
        position: absolute;
        top: 85%;
        right: 5%;
    }

    .img-triangle1-c1 {
        height: auto;
        width: 5%;
        position: absolute;
        top: 15%;
        right: 15%;
    }
</style>
