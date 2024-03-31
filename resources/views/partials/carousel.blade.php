<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <li data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></li>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            @include('partials.carousel.carousel1')
        </div>
        <div class="carousel-item">
            @include('partials.carousel.carousel2')
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .spin {
        animation-name: rotate;
        animation-duration: 12s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
    }

    @keyframes float-rl {
        0% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .floating-rl {
        animation-name: float-rl;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
    }

    @keyframes float-updwn {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(10px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .floating-updwn {
        animation-name: float-updwn;
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
    }
</style>
