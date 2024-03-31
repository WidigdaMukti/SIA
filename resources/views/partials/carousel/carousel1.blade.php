<div class="container-fluid"
    style="display: flex; justify-content: center; align-items: center; height:100vh; background-image: url('svg/carousel/bg1.svg'); background-size: cover;"
    data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="1000">
    <div class="row">
        <div class="col-md-6 p-0 d-flex align-items-center">
            <div class="container text-left p-4 m-4">
                <h1 class="text-green-3 responsive-text-title" data-aos="fade-right" data-aos-duration="2000"
                    data-aos-delay="1000" data-aos-easing="ease-in-sine">
                    Selamat Datang Di Website
                </h1>
                <h1 class="mb-4 text-orange responsive-text-title" data-aos="fade-right" data-aos-duration="2000"
                    data-aos-delay="1200" data-aos-easing="ease-in-sine">
                    SDIT AL Qudwah Ngadirejo
                </h1>
                <p class="text-gray responsive-text-title-6" style="font-weight:600;" data-aos="fade-right"
                    data-aos-delay="1400" data-aos-duration="2000" data-aos-easing="ease-in-sine">
                    SDIT Al Qudwah merupakan sekolah yang berkomitmen untuk mengembangkan fitrah anak-anak dengan budi
                    pekerti yang baik, pengetahuan yang luas, dan memiliki pemahaman Al-Quran.
                </p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center flex-column">
            <img class="img-main-c1 d-none d-md-inline" src="{{ asset('img/bg1-foto.png') }}" alt=""
                data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="1000">
            <img class="img-circle1-c1 floating-rl d-none d-lg-inline" src="{{ asset('svg/carousel/circle1.svg') }}"
                alt="" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="1100">
            <img class="img-circle2-c1 floating-rl d-none d-lg-inline" src="{{ asset('svg/carousel/circle2.svg') }}"
                alt="" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="1200">
            <img class="img-triangle1-c1 spin d-none d-lg-inline" src="{{ asset('svg/carousel/triangle.svg') }}"
                alt="" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="1300">
        </div>
    </div>
</div>

<style>
    h1 {
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
        top: 80%;
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
