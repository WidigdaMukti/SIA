@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid mb-4">
        <div class="row d-flex justify-content-center">
            <div class="col p-5 pt-0">
                    <div class="container-fluid p-0 mb-5" style="overflow: hidden;">
                        <img class="rounded-4" src="{{ asset('storage/' . $berita->gambar_thumbnail) }}" alt=""
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    <h1 class="mb-4 responsive-text-title-2" style="font-weight: bold">{{ $berita->judul }}</h1>
                    <div class="text-gray d-flex justify-content-between align-items-center">
                        <p class="text-gray responsive-text-normal-2">
                            <i class="bi bi-calendar-week me-2" aria-hidden="true"></i> {{ $berita->created_at->format('d F Y') }}
                        </p>
                        <i class="bi bi-share-fill" style="cursor: pointer;" id="copyLink" data-bs-toggle="popover"
                            data-bs-placement="left" data-bs-trigger="click" data-bs-content="Disalin di Papan klip"></i>
                    </div>
                    <hr class="mt-4 mb-4">
                    <p class="card-text text-gray responsive-text-normal"
                        style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $berita->slug }}
                    </p>
                    <p class="card-text text-gray responsive-text-normal"
                        style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                        {!! convertMarkdownToHtml($berita->content) !!}
                    </p>
                    {{--  <p class="responsive-text-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil culpa iure
                        fuga Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio dolor dignissimos voluptate
                        maxime excepturi quae assumenda tenetur! Repellat a, minima at tempore fugit fuga in, corrupti ut unde
                        accusamus ea.
                        repudiandae eum labore
                        maxime voluptatum laboriosam expedita voluptatem commodi praesentium, harum animi velit ratione
                        doloremque distinctio modi obcaecati?
                    </p>
                    <p class="responsive-text-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil culpa iure
                        fuga Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio dolor dignissimos voluptate
                        maxime excepturi quae assumenda tenetur! Repellat a, minima at tempore fugit fuga in, corrupti ut unde
                        accusamus ea.
                        repudiandae eum labore
                        maxime voluptatum laboriosam expedita voluptatem commodi praesentium, harum animi velit ratione
                        doloremque distinctio modi obcaecati?
                    </p>  --}}
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    // JavaScript
    $(document).ready(function() {
        $('#copyLink').popover().on('shown.bs.popover', function() {
            var $pop = $(this);
            setTimeout(function() {
                $pop.popover('hide');
            }, 500);
        });

        document.querySelector("#copyLink").addEventListener("click", function(event) {
            event.preventDefault();
            navigator.clipboard.writeText(window.location.href);
        });
    });
</script>
