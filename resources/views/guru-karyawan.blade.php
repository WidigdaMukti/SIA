@extends('layouts.main')

@section('content')
    @include('partials.banner')
    <div class="container-fluid pb-5 d-flex justify-content-center">
        <div class="">
            <div class="d-flex justify-content-center align-items-center mb-4">
                @include('partials.card.card-photo')
            </div>
            <div class="row mb-4 g-4 justify-content-between">
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
            </div>
            <div class="row mb-4 g-4  justify-content-between">
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
                <div class="col d-flex justify-content-center">
                    @include('partials.card.card-photo')
                </div>
            </div>
        </div>
    </div>
@endsection
