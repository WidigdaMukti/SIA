@extends('layouts.main')
@section('content')
    @include('partials.banner')

    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
            width: 17rem;
            height: auto;
        }
    </style>

    <div style="padding-left: 7vw; padding-right: 7vw;">
        <div class="container-fluid p-4 py-4 bg-green-4 d-flex justify-content-between mb-5 flex-column rounded-4"
            style="border: 1px solid rgb(236, 236, 236);">
            <div class="d-flex justify-content-center align-items-center ">
                <h1 class="responsive-text-title-4" style="font-weight: bold;">{{ $galeri->judul }}</h1>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                @foreach ($galeri->gambar as $gambar)
                    <div class="card m-3">
                        <img src="{{ asset('storage/' . $gambar) }}" alt="Image"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
