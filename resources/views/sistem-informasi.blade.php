@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container my-4">
        <div class="row justify-content-center">
            <!-- Card 1: Sistem Informasi Guru -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card" style="border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold">Sistem Informasi Guru</h5>
                        <p class="card-text">Sistem yang membantu guru dalam mengelola data siswa, Nilai dan Menglola Rapor
                            siswa.</p>
                        <a href="{{ url('/siaGuru') }}" class="btn btn-aksess">Akses
                            <i class="bi bi-box-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Sistem Informasi Siswa -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card" style="border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold">Sistem Informasi Siswa</h5>
                        <p class="card-text">Platform yang menyediakan akses informasi akademik bagi siswa.</p>
                        <a href="{{ url('/siaSiswa') }}" class="btn btn-aksess">Akses
                            <i class="bi bi-box-arrow-up-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Sistem Informasi Admin -->
            {{-- <div class="col-md-6 col-lg-4 mb-4">
                <div class="card" style="border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold">Sistem Informasi Admin</h5>
                        <p class="card-text">Sistem yang mendukung administrasi sekolah dalam mengelola data sekolah.</p>
                        <a href="{{ url('/siaAdmin') }}" class="btn btn-aksess">Akses
                            <i class="bi bi-box-arrow-up-right"></i></a>
                    </div>
                </div>
            </div> --}}
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
