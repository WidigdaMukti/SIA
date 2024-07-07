<?php

namespace Database\Factories;

use App\Models\EkskulRaport;
use App\Models\MapelRaport;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RaportSiswa>
 */
class RaportSiswaFactory extends Factory
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
            // 'id_mapel_raport' => function() {
            //     return MapelRaport::inRandomOrder()->first()->id;
            // },
            // 'id_ekskul_raport' => function() {
            //     return EkskulRaport::inRandomOrder()->first()->id;
            // },
            'kelas' => $this->faker->randomElement(['I / Satu' => 'I / Satu', 'II / Dua' => 'II / Dua', 'III / Tiga' => 'III / Tiga', 'IV / Empat' => 'IV / Empat', 'V / Lima' => 'V / Lima', 'VI / Enam' => 'VI / Enam']),
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'tahun_ajaran' => $this->faker->randomElement(['2020/2021', '2021/2022']),
            'wali_kelas' => $this->faker->name(),
            'sakit' => $this->faker->numberBetween(0, 10),
            'izin' => $this->faker->numberBetween(0, 10),
            'tanpa_keterangan' => $this->faker->numberBetween(0, 10),
            'catatan_wali_kelas' => $this->faker->sentence(),
        ];
    }
}
