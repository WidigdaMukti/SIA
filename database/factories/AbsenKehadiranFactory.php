<?php

namespace Database\Factories;

use App\Models\AbsensiSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsenKehadiran>
 */
class AbsenKehadiranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_absensi_siswa' => function() {
                return AbsensiSiswa::inRandomOrder()->first()->id;
            },
            'tanggal' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Hadir', 'Tanpa Keterangan', 'Izin', 'Sakit'])
        ];
    }
}
