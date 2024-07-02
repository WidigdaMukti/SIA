<?php

namespace Database\Factories;

use App\Models\MapelKelas;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsensiSiswa>
 */
class AbsensiSiswaFactory extends Factory
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
            // 'id_siswa' => function() {
            //     return Siswa::inRandomOrder()->first()->id;
            // },
            'id_mapel_kelas' => function() {
                return MapelKelas::inRandomOrder()->first()->id;
            },
            // 'tanggal' => $this->faker->date(),
            // 'status_kehadiran' => $this->faker->boolean(),
        ];
    }
}
