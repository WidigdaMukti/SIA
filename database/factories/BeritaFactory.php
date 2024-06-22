<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'gambar_thumbnail' => $this->faker->image('public/img/berita', 1024, 768, null, false),
                'judul' => $this->faker->sentence,
                'slug' => $this->faker->paragraph,
                'content' => $this->faker->paragraph,
        ];
    }
}
