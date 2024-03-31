<div class="container-fluid"
    style="display: flex; justify-content: center; align-items: center; height:40vh; background-image: url('img/banner.png'); background-size: cover;">
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h1 class="responsive-text-title-5" style="font-weight: bold;">{{ $title }}</h1>
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
            <ol class="breadcrumb responsive-text-normal-1">
                <li class="breadcrumb-item "><a class="text-black link-banner text-decoration-none"
                        href="/">Beranda</a></li>
                <li class="breadcrumb-item text-green-1" aria-current="page" style="font-weight: bold;">
                    {{ $title }}</li>
            </ol>
        </nav>
    </div>
</div>
<script>
    // ini untuk text link
    $(document).ready(function() {
        $(".link-banner").hover(
            function() {
                $(this).removeClass("text-black").addClass("text-green-1");
            },
            function() {
                $(this).removeClass("text-green-1").addClass("text-black");
            }
        );
    });
</script>
