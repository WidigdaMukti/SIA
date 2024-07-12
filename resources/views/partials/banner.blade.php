@php
    // Ambil path dari request dan pecah menjadi array
    $url = request()->getPathInfo();
    $items = explode('/', $url);
    // Hapus elemen pertama kosong
    unset($items[0]);
@endphp

<div class="container-fluid"
    style="display: flex; justify-content: center; align-items: center; height: 38vh; background-image: url('/img/banner.png'); background-size: cover;">
    <div
        style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
        <h1 class="responsive-text-title-5" style="font-weight: bold;">{{ $title }}</h1>
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '/'">
            <ol class="breadcrumb responsive-text-normal-1">
                <li class="breadcrumb-item"><a class="text-black text-decoration-none" href="/">Beranda</a></li>
                @php
                    $pathAccumulated = '/';
                @endphp
                @foreach ($items as $key => $item)
                    @php
                        // Ganti tanda hubung dengan spasi
                        $item = str_replace('-', ' ', $item);
                        $pathAccumulated .= $item . '/';
                    @endphp
                    @if ($loop->last)
                        <li class="breadcrumb-item text-decoration-none text-black" aria-current="page"
                            style="font-weight: bold;">
                            {{ ucfirst($item) }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none text-black" href="{{ $pathAccumulated }}">
                                {{ ucfirst($item) }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>
