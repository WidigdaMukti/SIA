<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | SDIT Al Qudwah Ngadirejo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/responsive-button.css">

</head>

<body class="bg-green-4" style="font-family: Nunito, sans-serif;">

    <nav class="navbar navbar-expand-lg bg-green-3 navbar-dark p-0 py-2">
        <div class="container-fluid" style="padding-left:7%; padding-right:7%;">
            <a class="navbar-brand me-5" href="/">
                <img src="svg/bw logo.svg" alt="logo" width="200px" height="auto">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item text-white responsive-text-head" style="font-weight: bold;">
                        Penerimaan Peserta Didik Baru Online
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="/" class="btn btn-outline-light me-3" style="font-weight:bold;">Beranda</a>
                    <div class="line-v" style="border-left: 1px solid white; height: 28px; opacity: 0.4;"></div>
                    <a href="/informasi-ppdb" class="btn btn-outline-light ms-3"
                        style="font-weight:bold;">Persyaratan<span style="color: transparent;">-</span>PPDB
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div>
        @yield('main-ppdb')
    </div>

    <a href="https://wa.me/6281325825097" target="_blank" class="btn d-flex align-items-center"
        style="text-decoration: none; position: fixed; bottom: 28px; right: 28px; z-index: 5; border-radius: 0.8em; background-color: #61876e; color: white; font-weight: bold; text-align: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
        <i class="bi bi-whatsapp"></i><span class="ms-2 d-none d-md-inline">Hubungi Kami</span>
    </a>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
    </script>

</body>

</html>
