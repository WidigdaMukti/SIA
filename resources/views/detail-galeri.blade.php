@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid p-2 pb-5" style="font-size: 24px">
        <div class="text-justify pb-5" style="padding-left: 15rem; padding-right: 15rem;">
            <div>
                <h1 class="mb-5" style="font-weight: bold; font-size: 2em;">
                    Kunjungan PMI
                </h1>
                <div style="display: flex; align-items: center; justify-content: center;">
                    @include('partials.image-slider')
                </div>
                <hr class="mt-5">
            </div>
        </div>
    </div>
@endsection
