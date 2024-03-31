@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div style="padding-left: 7vw; padding-right: 7vw;">
        <div class="container-fluid p-4 pb-3 bg-green-4 d-flex justify-content-between my-5 flex-column rounded-4"
            style="border: 1px solid rgb(236, 236, 236);">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h1 class="responsive-text-title-5" style="font-weight: bold;">Kegiatan Kunjungan PMI</h1>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                    aria-expanded="false" aria-controls="collapse1" style="background: none; border: none; color: black;">
                    <i id="toggleIcon1" class="bi bi-chevron-down" style="font-size:1.5em;"></i>
                </button>
            </div>
            <div id="collapse1" class="collapse">
                @include('partials.image-slider')
            </div>
        </div>
    </div>
    <div style="padding-left: 7vw; padding-right: 7vw;">
        <div class="container-fluid p-4 pb-3 bg-green-4 d-flex justify-content-between my-5 flex-column rounded-4"
            style="border: 1px solid rgb(236, 236, 236);">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h1 class="responsive-text-title-5" style="font-weight: bold;">Kegiatan Kunjungan Pak Jokowi</h1>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                    aria-expanded="false" aria-controls="collapse2" style="background: none; border: none; color: black;">
                    <i id="toggleIcon2" class="bi bi-chevron-down" style="font-size:1.5em;"></i>
                </button>
            </div>
            <div id="collapse2" class="collapse">
                @include('partials.image-slider')
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        document.getElementById('collapse1').addEventListener('show.bs.collapse', function() {
            document.getElementById('toggleIcon1').className = 'bi bi-chevron-up';
        })

        document.getElementById('collapse1').addEventListener('hide.bs.collapse', function() {
            document.getElementById('toggleIcon1').className = 'bi bi-chevron-down';
        })

        document.getElementById('collapse2').addEventListener('show.bs.collapse', function() {
            document.getElementById('toggleIcon2').className = 'bi bi-chevron-up';
        })

        document.getElementById('collapse2').addEventListener('hide.bs.collapse', function() {
            document.getElementById('toggleIcon2').className = 'bi bi-chevron-down';
        })
    </script>
@endsection
