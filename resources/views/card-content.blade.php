@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid mb-5">
        <div class="row" style="padding-left: 15rem; padding-right: 15rem;">
            <div class="col me-5">
                <div class="container-fluid bg-black p-0 mb-5" style="overflow: hidden;">
                    <img class="" src="{{ asset('img/lomba.jpg') }}" alt=""
                        style="width: 100%; height: auto; object-fit: cover;">
                </div>
                <h1 class="mb-4" style="font-weight: bold">Juara 1 Lomba BTQ</h1>
                <div class="text-gray d-flex justify-content-between align-items-center" style="font-size: 20px">
                    <span><i class="bi bi-calendar-week me-2" aria-hidden="true"></i>22
                        Februari, 2024</span>
                    <i class="bi bi-share-fill" aria-hidden="true" onclick="shareLink()"></i>
                </div>
                <hr class="mb-5">
                <p style="font-size: 24px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil culpa iure fuga
                    repudiandae eum labore
                    maxime voluptatum laboriosam expedita voluptatem commodi praesentium, harum animi velit ratione
                    doloremque distinctio modi obcaecati?</p>
            </div>

        </div>
    </div>
@endsection

<script>
    function shareLink() {
        var url = window.location.href; // Ganti dengan URL yang ingin Anda bagikan
        navigator.clipboard.writeText(url).then(function() {
            alert('Link copied to clipboard!');
        }).catch(function(error) {
            alert('Error in copying link: ' + error);
        });
    }
</script>
