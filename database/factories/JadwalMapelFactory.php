<?php

namespace Database\Factories;

use App\Models\MapelKelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalMapel>
 */
class JadwalMapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_mapel_kelas' => function() {
                return MapelKelas::inRandomOrder()->first()->id;
            },
            'hari' => $this->faker->dayOfWeek,
            'jam_mulai' => $this->faker->time('H:i:s'),
            'jam_selesai' => $this->faker->time('H:i:s'),
            // 'status' => $this->faker->boolean()
        ];
    }
}
