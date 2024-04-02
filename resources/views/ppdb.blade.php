@extends('layouts.ppdb')

@section('main-ppdb')
    <div class="container d-flex flex-column align-items-start justify-content-center mt-4 p-5 bg-white"
        style="border-radius: 20px; border: 1px solid #e0e4e4; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <h1 class="responsive-text-head" style="font-weight: 740; color:#3c6255;">
            Formulir Pendaftaran
        </h1>
        <h5 class="mt-3 responsive-text-normal" style="font-weight: bold;">Harap Diperhatikan Sebelum Mengisi Formulir</h5>
        <ul class="mt-1 responsive-text-normal">
            <li>Pastikan semua data yang Anda isikan telah sesuai dengan KTP, Kartu Keluarga, dan lainnya </li>
            <li>Isilah jawaban sesuai dengan pertanyaan yang diberikan</li>
            <li>Periksa kembali semua data yang telah Anda isikan sebelum mengirimkan formulir</li>
        </ul>
    </div>
    <div class="container d-flex justify-content-center bg-white my-4"
        style="border-radius: 20px; border: 1px solid #e0e4e4; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
        <div class="row responsive-text-normal">
            @include('partials.form-ppdb')
        </div>
    </div>
@endsection

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
