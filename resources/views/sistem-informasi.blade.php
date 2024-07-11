@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container my-4">
        <div class="row justify-content-center">

            <!-- Kolom untuk kartu 1 dan 2 -->
            <div class="col-md-6 mb-4">
                <div class="row">
                    <!-- Card 1: Sistem Informasi Guru -->
                    <div class="col-md-12 mb-4">
                        <div class="card" style="border-radius: 12px;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold">Sistem Informasi Guru</h5>
                                <p class="card-text">Sistem yang membantu guru dalam mengelola data siswa, Nilai dan
                                    Mengelola
                                    Rapor siswa.</p>
                                <a href="{{ url('/siaGuru') }}" class="btn btn-aksess">Akses
                                    <i class="bi bi-box-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Sistem Informasi Siswa -->
                    <div class="col-md-12 mb-4">
                        <div class="card" style="border-radius: 12px;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold">Sistem Informasi Siswa</h5>
                                <p class="card-text">Platform yang menyediakan akses informasi akademik bagi siswa.</p>
                                <a href="{{ url('/siaSiswa') }}" class="btn btn-aksess">Akses
                                    <i class="bi bi-box-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom untuk kartu 3 -->
            <div class="col-md-6 mb-4">
                <div class="card" style="border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold">Aplikasi Sistem Informasi Siswa</h5>
                        <p class="card-text">Aplikasi yang menyediakan akses informasi akademik bagi siswa <span><a
                                    href="{{ url('https://drive.google.com/drive/folders/1K9WgPWWeMic_y5R7llcFulXX0zXIpkvZ?usp=drive_link') }}"
                                    class="text-decoration-none text-orange-1">Unduh
                                    Aplikasi Seluler</a></span></p>
                        <img class="mb-1" src="svg/Aplikasi Seluler Sistem Informasi Siswa.svg" alt="barcode"
                            width="200" height="200" style="display: block; margin: 0 auto;">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<style>
    .btn.btn-aksess {
        background-color: #f3b664;
        color: white;
        transition: all 0.3s ease;
    }

    .btn.btn-aksess:hover {
        background-color: #eb9c36;
        color: white;
        font-weight: bold;
    }
</style>
