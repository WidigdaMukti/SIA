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

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex flex-column align-items-center text-center" id="successModalLabel"
                        style="font-weight: bold; width: 100%;">
                        <span class="mb-3">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                        </span>
                        <span>Pendaftaran Berhasil</span>
                    </h5>
                </div>
                <div class="modal-body text-center">
                    Pendaftaran Anda telah berhasil disimpan, Bukti Pendaftaran akan dikirim melalui nomor yang telah diisi
                    sebelumnya, harap cek secara berkala!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal"
                        style="background-color: #3c6255; color: white;">Tutup</button>
                    <!-- Tambahan tombol lain jika diperlukan -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#successModal').modal('show');
            @endif
        });
    </script>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
