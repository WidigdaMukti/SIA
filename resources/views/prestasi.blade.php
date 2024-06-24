@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid p-2">
        <div class="d-flex justify-content-center flex-wrap">
            @foreach ($dataPrestasi as $prestasi)
                <div class="card m-3" style="width: 24rem; height: 32rem;">
                    <div class="img-container rounded-1" style="overflow: hidden;">
                        <a href="{{ route('prestasi', ['id' => $prestasi->id]) }}" class="img-link">
                            <img src="{{ asset('storage/' . $prestasi->thumbnail) }}" alt="Thumbnail Gambar"
                                style="object-fit: cover; height: 19rem; width: 100%;">
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-gray responsive-text-normal-2">
                            <i class="bi bi-calendar-week me-2" aria-hidden="true"></i>
                            {{ $prestasi->created_at->format('d F Y') }}
                        </p>
                        <a class="text-decoration-none" href="{{ route('prestasi', ['id' => $prestasi->id]) }}">
                            <h2 class="card-title text-truncate mb-2 text-black responsive-text-head"
                                style="font-weight:bold;">
                                {{ $prestasi->nama }}</h2>
                        </a>
                        <p class="card-text text-gray responsive-text-normal"
                            style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $prestasi->slug }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center pb-2">
        <x-pagination :paginator="$dataPrestasi" />
    </div>
@endsection
