<style>
    .btn-card {
        color: #61876e;
        border: 1px solid #61876e;
    }

    .btn-card:hover {
        color: #FFFFFF;
        background-color: #61876e;
    }
</style>

<div class="card" style="width: 24rem; height: 32rem;">
    <div class="img-container rounded-1" style="overflow: hidden;">
        <a href="/card-content" class="img-link">
            <img src="{{ asset('img/carousel3.jpg') }}" class="card-img-top" alt="..."
                style="object-fit: cover; height: 100%; width: 100%;">
        </a>
    </div>
    <div class="card-body p-4">
        <a class="text-decoration-none" href="#">
            <h2 class="card-title text-truncate mb-3 text-black responsive-text-head" style="font-weight:bold;">
                Hafiz Al-Quran
            </h2>
        </a>
        <p class="card-text text-gray responsive-text-normal mb-4"
            style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis minima, accusantium rem ex fuga nisi
            debitis sapiente commodi, necessitatibus hic sed sint! Voluptatum tenetur voluptatem rerum
            voluptatibus aut aperiam atque consectetur cum eum molestiae. Nesciunt quo dolorum velit sapiente
            obcaecati sit ducimus illum, eius quis vitae debitis aliquid perferendis earum, fugiat perspiciatis,
            vel adipisci.</p>
        <a href="/card-content" class="btn btn-card" style="text-decoration: none;">Selengkapnya</a>
    </div>
</div>
