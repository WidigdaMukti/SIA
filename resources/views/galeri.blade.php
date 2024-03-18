@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid p-2 pb-3" style="display: flex; justify-content: center;">
        <div class="pb-5" style="align-content: center">
            <div class="row mb-4">
                <div class="col">
                    @include('partials.card.card-galeri')
                </div>
                <div class="col">
                    @include('partials.card.card-galeri')
                </div>
                <div class="col">
                    @include('partials.card.card-galeri')
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center pb-5">
        @include('partials.pagination')
    </div>
@endsection
