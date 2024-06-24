@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid p-2 mb-5">
        <div class="d-flex justify-content-center flex-wrap">
            @foreach ($dataGaleri as $galeri)
                <div class="card m-3" style="width: 22rem; height: 26rem;">
                    <div class="img-container rounded-1" style="overflow: hidden;">
                        <a href="{{ route('galeri.show', ['galeri' => $galeri->id]) }}" class="img-link">
                            <img src="{{ asset('storage/' . $galeri->thumbnail) }}" class="card-img-top" alt="thumnail"
                                style="object-fit: cover; height: 19rem; width: 100%;">
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-gray responsive-text-normal-1"><i class="bi bi-images me-2" aria-hidden="true"
                                style="font-size:1.2em;"></i>{{ $galeri->jumlah_gambar }}</p>
                        <a class="text-decoration-none" href="{{ route('galeri.show', ['galeri' => $galeri->id]) }}">
                            <h2 class="card-title text-truncate mb-3 text-black responsive-text-title-5"
                                style="font-weight:bold;">
                                {{ $galeri->judul }}
                            </h2>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
