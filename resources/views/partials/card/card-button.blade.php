<style>
    .btn-card {
        color: #61876e;
        border: 1px solid #61876e;
        border-radius: 8px;
        padding: 10px;
    }

    .btn-card:hover {
        color: #FFFFFF;
        background-color: #61876e;
    }
</style>

<div class="card" style="width: 36rem; height: 46rem;">
    <div class="img-container" style="overflow: hidden;">
        <a href="/card-content" class="img-link">
            <img src="{{ asset('img/carousel3.jpg') }}" class="card-img-top" alt="..."
                style="object-fit: cover; height: 480px;">
        </a>
    </div>
    <div class="card-body p-5 pt-4">
        <a class="text-decoration-none" href="#">
            <h2 class="card-title text-truncate mb-3 text-black" style="font-size: 32px; font-weight:bold;">Hafiz
                Al-Quran
            </h2>
        </a>
        <p class="card-text text-gray"
            style="font-size: 22px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 35px;">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis minima, accusantium rem ex fuga nisi
            debitis sapiente commodi, necessitatibus hic sed sint! Voluptatum tenetur voluptatem rerum
            voluptatibus aut aperiam atque consectetur cum eum molestiae. Nesciunt quo dolorum velit sapiente
            obcaecati sit ducimus illum, eius quis vitae debitis aliquid perferendis earum, fugiat perspiciatis,
            vel adipisci.</p>
        <a href="/card-content" class="btn-card" style="text-decoration: none; font-size:22px;">Selengkapnya</a>
    </div>
</div>
