<style>
    .wrapper {
        width: 100%;
        position: relative;
    }

    .wrapper i {
        top: 50%;
        height: 50px;
        width: 50px;
        cursor: pointer;
        font-size: 1.25rem;
        position: absolute;
        text-align: center;
        line-height: 50px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
        transform: translateY(-50%);
        transition: transform 0.1s linear;
    }

    .wrapper i:active {
        transform: translateY(-50%) scale(0.85);
    }

    .wrapper i:first-child {
        left: -22px;
    }

    .wrapper i:last-child {
        right: -22px;
    }

    .wrapper .carousel {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: calc((100% / 3) - 1px);
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 16px;
        border-radius: 8px;
        scroll-behavior: smooth;
        scrollbar-width: none;
    }

    .carousel::-webkit-scrollbar {
        display: none;
    }

    .carousel.no-transition {
        scroll-behavior: auto;
    }

    .carousel.dragging {
        scroll-snap-type: none;
        scroll-behavior: auto;
    }

    .carousel.dragging .card {
        cursor: grab;
        user-select: none;
    }

    .carousel :where(.card, .img) {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel .card {
        overflow: hidden;
        scroll-snap-align: start;
        height: 540px;
        list-style: none;
        cursor: pointer;
        padding-bottom: 15px;
        flex-direction: column;
        border-radius: 8px;
    }

    .carousel .img {
        object-fit: contain;
    }
</style>

<div class="wrapper">
    <i id="left" class="bi bi-chevron-left" style="z-index: 2;"></i>
    <ul class="carousel">
        <li class="card">
            <div class="img"><img src="img/kegiatan-1.jpg" alt="img" draggable="false"></div>
        </li>
        <li class="card">
            <div class="img"><img src="img/carousel2.jpg" alt="img" draggable="false"></div>

        </li>
        <li class="card ">
            <div class="img"><img src="img/kegiatan-2.jpg" alt="img" draggable="false"></div>

        </li>
        <li class="card ">
            <div class="img"><img src="img/carousel1.jpg" alt="img" draggable="false"></div>

        </li>
        <li class="card ">
            <div class="img"><img src="img/kegiatan-1.jpg" alt="img" draggable="false"></div>

        </li>
        <li class="card ">
            <div class="img"><img src="img/carousel3.jpg" alt="img" draggable="false"></div>

        </li>
    </ul>
    <i id="right" class="bi bi-chevron-right"></i>
</div>
<script src="js/slider.js"></script>
