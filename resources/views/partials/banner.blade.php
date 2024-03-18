<div class="container-fluid"
    style="display: flex; justify-content: center; align-items: center; height:400px; background-image: url('img/banner.png'); background-size: cover;">
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h1 style="font-size: 3em; font-weight: bold;">{{ $title }}</h1>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
            <ol class="breadcrumb" style=" font-size: 1.3em;">
                <li class="breadcrumb-item "><a class="text-black link-banner text-decoration-none"
                        href="/">Beranda</a></li>
                <li class="breadcrumb-item text-green-1" aria-current="page" style="font-weight: bold;">
                    {{ $title }}</li>
            </ol>
        </nav>
    </div>
</div>
<script src="js/banner.js"></script>
