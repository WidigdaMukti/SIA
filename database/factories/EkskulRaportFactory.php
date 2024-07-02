<?php

namespace Database\Factories;

use App\Models\RaportSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EkskulRaport>
 */
class EkskulRaportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'raport_siswa_id' => function() {
                return RaportSiswa::inRandomOrder()->first()->id;
            },
            'nama' => $this->faker->name,
            'keterangan' => $this->faker->paragraph,
        ];
    }
}
