@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid p-2" style="display: flex; justify-content: center;">
        <div class="" style="align-content: center">
            <div class="row mb-4">
                <div class="col d-flex justify-content-center me-4">
                    @include('partials.card.card-button')
                </div>
                <div class="col d-flex justify-content-center me-4">
                    @include('partials.card.card-button')
                </div>
                <div class="col d-flex justify-content-center mb-4">
                    @include('partials.card.card-button')
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center pb-5">
        @include('partials.pagination')
    </div>
@endsection
