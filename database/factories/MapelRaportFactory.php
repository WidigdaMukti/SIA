<?php

namespace Database\Factories;

use App\Models\MapelKelas;
use App\Models\Nilai;
use App\Models\RaportSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MapelRaport>
 */
class MapelRaportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id_mapel_kelas_nilai' => function() {
            //     return Nilai::inRandomOrder()->first()->id;
            // },
            'raport_siswa_id' => function() {
                return RaportSiswa::inRandomOrder()->first()->id;
            },
            'nama_mapel' => $this->faker->randomElement(['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'IPA', 'IPS', 'PKN']),            'kkm' => $this->faker->numberBetween(60, 100), // Assuming KKM ranges from 60 to 100
            'nilai_akhir' => $this->faker->numberBetween(1, 100), // Assuming nilai_akhir ranges from 1 to 100
            'capaian_kompetensi' => $this->faker->paragraph, // Generates a random paragraph
        ];
    }
}
