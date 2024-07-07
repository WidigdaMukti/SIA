@extends('layouts.main')

@section('content')
    @include('partials.banner')

    <div class="container px-5 mb-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-4">
            @foreach ($guruStaffs as $index => $guruStaff)
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $guruStaff->foto) }}" class="card-img-top" alt="{{ $guruStaff->nama_lengkap_tendik }}"
                            style="object-fit: cover; height: 14rem;">
                        <div class="text-center mt-3">
                            <h5 style="font-weight: bold;">{{ $guruStaff->nama_lengkap_tendik }}</h5>
                            <p>{{ $guruStaff->jabatan }}</p>
                        </div>
                    </div>
                </div>

                @if (($index + 1) % 5 == 0)
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-4 mb-4">
            @endif
            @endforeach
        </div>
    </div>
@endsection
