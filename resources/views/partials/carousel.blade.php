<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <li data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></li>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            @include('partials.carousel.caraousel1')
        </div>
        <div class="carousel-item">
            @include('partials.carousel.caraousel2')
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
