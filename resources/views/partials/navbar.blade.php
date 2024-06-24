<nav class="navbar fixed-top navbar-expand-xxl navbar-light bg-transparent">
    <div class="container-fluid" style="padding-left:7%; padding-right:7%;">
        <a class="navbar-brand me-5" href="/">
            <img src="/svg/logo.svg" alt="Logo" width="200px" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item me-4">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle {{ Request::is('tentang-kami', 'yayasan', 'guru-karyawan') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="/tentang-kami">Tentang Kami</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/yayasan">Yayasan</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/guru-karyawan">Guru & Karyawan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle {{ Request::is('program', 'prestasi', 'tata-tertib', 'ekstrakulikuler') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="/program">Program</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/prestasi">Prestasi</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/ekstrakulikuler">Ekstrakulikuler</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle {{ Request::is('informasi-ppdb', 'sistem-informasi') ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item" href="/Informasi">Informasi Umum</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/informasi-ppdb">Informasi PPDB</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/sistem-informasi">Sistem Informasi</a></li>
                    </ul>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}" aria-current="page"
                        href="/galeri">Galeri</a>
                </li>
            </ul>
            <div class="d-flex">
                <div class="row text-start">
                    <a class="btn btn-ppdb me-2 ms-0" href="/ppdb-online" style="width: 8rem">PPDB
                        Online
                    </a>
                    <div class="input-group" style="width: 12rem;">
                        <input type="search" class="form-control"
                            style="border-right: 0; border-width: 1px; border-color: rgb(175, 175, 175);"
                            placeholder="Cari..." aria-label="Search" list="datalistOptions">
                        <datalist id="datalistOptions">
                            <option value="Informasi PPDB">
                            <option value="Program Unggulan">
                            <option value="Ekstrakulikuler">
                        </datalist>
                        <button class="btn bg-white"
                            style="border-left: 0; border-width: 1px; border-color: rgb(175, 175, 175)" type="submit">
                            <i class="bi bi-search text-gray"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    .navbar {
        font-size: clamp(1.2rem, 1.2vw, 1.4rem);
        font-weight: bold;
    }

    .navbar .dropdown-menu .dropdown-item:active {
        background-color: #f2f9f6;
    }

    .dropdown-item:hover {
        color: #61876E;
    }

    .btn-ppdb {
        background-color: #61876E;
        color: white;
        transition: all 0.3s ease;
    }

    .btn.btn-ppdb:hover {
        font-weight: bold;
        background-color: #3c6255;
        color: white;
    }

    .btn.btn-outline-green-3:active {
        background-color: #61876E;
        color: white;
    }

    .btn.btn-outline-green-3:active i {
        color: white;
    }
</style>

<script>
    // transparansi navbar
    $(document).ready(function() {
        // Fungsi untuk menangani perubahan warna navbar saat scroll
        function updateNavbarBackground() {
            if ($(window).scrollTop() > 50) {
                $(".navbar").removeClass("bg-transparent");
                $(".navbar").addClass("bg-light");
            } else {
                $(".navbar").removeClass("bg-light");
                $(".navbar").addClass("bg-transparent");
            }
        }

        // Panggil fungsi pertama kali saat halaman dimuat
        updateNavbarBackground();

        // Panggil fungsi setiap kali terjadi scroll
        $(window).scroll(function() {
            updateNavbarBackground();
        });

        // Fungsi untuk menangani perubahan warna navbar saat tombol toggler ditekan
        $(".navbar-toggler").click(function() {
            if ($(window).scrollTop() <= 50) {
                // Jika posisi scroll kurang dari atau sama dengan 50
                $(".navbar").toggleClass("bg-light bg-transparent");
            }
        });
    });
</script>
