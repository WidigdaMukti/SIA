<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\MapelKelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik_siswa' => function() {
                return Siswa::inRandomOrder()->first()->nik_siswa;
            },
            'id_mapel_kelas' => function() {
                return MapelKelas::inRandomOrder()->first()->id;
            },
            'kkm' => $this->faker->numberBetween(60, 100),
            'nilai_uh1' => $this->faker->numberBetween(0, 100),
            'nilai_uh2' => $this->faker->numberBetween(0, 100),
            'nilai_uh3' => $this->faker->numberBetween(0, 100),
            'nilai_tgs_1' => $this->faker->numberBetween(0, 100),
            'nilai_tgs_2' => $this->faker->numberBetween(0, 100),
            'nilai_tgs_3' => $this->faker->numberBetween(0, 100),
            'nilai_uts' => $this->faker->numberBetween(0, 100),
            'nilai_uas' => $this->faker->numberBetween(0, 100),
            'rata_rata' => $this->faker->numberBetween(0, 100),
        ];
    }
}
