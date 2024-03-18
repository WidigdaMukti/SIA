<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@extends('layouts.ppdb')

@section('main-ppdb')
    <div class="container-fluid"
        style="display: flex; align-items: center; height:280px; background-image: url('img/artboard bg.png'); background-size: cover;">
        <div class="container" style=" margin-left: 0; padding-left: 0;">
            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                <ol class="breadcrumb text-white" style="font-size: 1.3em;">
                    <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-white ms-2" style="font-weight: bold;">/</li>
                    <li class="breadcrumb-item text-white" aria-current="page" style="font-weight: bold;">
                        {{ $title }}</li>
                </ol>
            </nav>
            <h1 class="text-white" style="font-weight: bold; font-size:3em;">PPDB Online SDIT Al Qudwah Ngadirejo</h1>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-start justify-content-center mt-5 p-5 bg-white"
        style="border-radius: 20px; border: 1px solid #e0e4e4; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <h1 style="font-weight: bold; font-size: 4em; color:#3c6255;">
            Formulir Pendaftaran
        </h1>
        <h5 class="mt-3" style="font-weight: bold;">Harap Diperhatikan Sebelum Mengisi Formulir</h5>
        <ul class="mt-1" style="font-size: 1.2em;">
            <li>Pastikan semua data yang Anda isikan telah sesuai dengan KTP, Kartu Keluarga, dan lainnya </li>
            <li>Isilah jawaban sesuai dengan pertanyaan yang diberikan</li>
            <li>Periksa kembali semua data yang telah Anda isikan sebelum mengirimkan formulir</li>
        </ul>
    </div>
    <div class="container d-flex justify-content-center bg-white my-5"
        style="border-radius: 20px; border: 1px solid #e0e4e4; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <div class="row" style="font-size: 1.4em;">
            @include('partials.form-ppdb')
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
</script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">

<style>
    /* nav-link */
    #navbar-pendaftaran .nav-link {
        color: #3c6255;
    }

    #navbar-pendaftaran .nav-link:hover {
        font-weight: bold;
    }

    #navbar-pendaftaran .nav-link.active {
        background-color: #3c6255;
        color: white;
    }

    .submit-style:hover {
        font-weight: bold;
    }

    /* sticky top */
    .sticky-top.custom-sticky {
        top: 1.5em;
    }

    /* untuk js batas bawah */
    .batas-5 {
        margin-bottom: 3rem;
        /* Setara dengan mb-5 di Bootstrap */
    }

    .batas-4 {
        margin-bottom: 1.5rem;
        /* Setara dengan mb-4 di Bootstrap */
    }
</style>

<script>
    $(document).ready(function() {
        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

        // Sembunyikan div saat halaman dimuat dan ubah class margin
        $('.tk-info').hide();
        $('.batas-5').addClass('batas-5').removeClass('batas-4');

        // Tampilkan atau sembunyikan div berdasarkan pilihan select
        $('.form-select').change(function() {
            if ($(this).val() == '2') {
                // Tampilkan div dan ubah class margin
                $('.tk-info').show();
                $('.batas-5').addClass('batas-4').removeClass('batas-5');
            } else {
                // Sembunyikan div dan ubah class margin
                $('.tk-info').hide();
                $('.batas-4').addClass('batas-5').removeClass('batas-4');
            }
        });

    });
</script>
