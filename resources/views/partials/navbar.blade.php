<link rel="stylesheet" href="css/navbar.css">

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent">
    <div class="collapse navbar-collapse justify-content-center " id="navbarSupportedContent">
        <ul class="navbar-nav mt-2 mb-2">
            <li class="nav-item me-4">
                <a class="navbar-brand" href="/">
                    <img src="svg/logo.svg" alt="Logo" width="100%" height="auto">
                </a>
            </li>

            <li class="nav-item me-4">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
            </li>
            <li class="nav-item dropdown me-4">
                <a class="nav-link dropdown-toggle {{ Request::is('tentang-kami', 'yayasan', 'guru-karyawan') ? 'active' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </a>
                <ul class="dropdown-menu">
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
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/program">Program</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/prestasi">Prestasi</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
            </li>
            <li><a class="dropdown-item" href="/ekstrakulikuler">Ekstrakulikuler</a></li>
        </ul>
        </li>
        <li class="nav-item dropdown me-4">
            <a class="nav-link dropdown-toggle {{ Request::is('informasi-ppdb', 'sistem-informasi') ? 'active' : '' }}"
                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Informasi
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/informasi-umum">Informasi Umum</a></li>
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
            <a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}" href="/galeri">Galeri</a>
        </li>
        <li class="nav-item me-4">
            <a class="btn navbar-btn" href="/ppdb-online" style="background-color: #61876E; color: white;">PPDB
                Online</a>
        </li>
        <li class="nav-item">
            <a class="btn bi bi-search navbar-btn" id="searchBtn"></a>
            <div class="search-container" id="searchContainer">
                <input type="text" class="form-control" placeholder="">
            </div>
        </li>
        </ul>
    </div>
</nav>

<script>
    // fungsi search bar
    var searchBtn = document.getElementById("searchBtn");
    var searchContainer = document.getElementById("searchContainer");

    searchBtn.addEventListener("click", function(event) {
        event.stopPropagation();
        searchContainer.classList.toggle("active");
        if (searchContainer.classList.contains("active")) {
            searchContainer.querySelector("input").focus();
        }
    });

    document.addEventListener("click", function(event) {
        var isClickInside =
            searchContainer.contains(event.target) ||
            searchBtn.contains(event.target);
        if (!isClickInside && searchContainer.classList.contains("active")) {
            searchContainer.classList.remove("active");
        }
    });
    // fungsi search bar

    // transparansi navbar
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            // Jika posisi scroll lebih dari 50
            $(".navbar").removeClass("bg-transparent"); // Hapus kelas 'bg-transparent'
            $(".navbar").addClass("bg-light"); // Tambahkan kelas 'bg-light'
        } else {
            $(".navbar").removeClass("bg-light"); // Hapus kelas 'bg-light'
            $(".navbar").addClass("bg-transparent"); // Tambahkan kelas 'bg-transparent'
        }
    });
    // transparansi navbar
</script>
