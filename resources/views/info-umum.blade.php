@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container d-flex justify-content-center">
        <div class="row mb-3 d-flex justify-content-center">
            @foreach ($dataBerita as $berita)
                <div class="col mb-5 d-flex justify-content-center">
                    <div class="card" style="width: 24rem; height: 32rem;">
                        <div class="img-container rounded-1" style="overflow: hidden;">
                            <a href="{{ route('berita', ['id' => $berita->id]) }}" class="img-link">
                                <img src="{{ asset('storage/' . $berita->gambar_thumbnail) }}" alt="Thumbnail Gambar"
                                    style="object-fit: cover; height: 19rem; width: 100%;">
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-gray responsive-text-normal-2">
                                <i class="bi bi-calendar-week me-2" aria-hidden="true"></i>
                                {{ $berita->created_at->format('d F Y') }}
                            </p>
                            <a class="text-decoration-none" href="{{ route('berita', ['id' => $berita->id]) }}">
                                <h2 class="card-title text-truncate mb-2 text-black responsive-text-head"
                                    style="font-weight:bold;">{{ $berita->judul }}</h2>
                            </a>
                            <p class="card-text text-gray responsive-text-normal"
                                style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $berita->slug }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center pb-5">
        <x-pagination :paginator="$dataBerita" />
    </div>
@endsection
