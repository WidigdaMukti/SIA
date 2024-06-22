<?php

namespace Database\Factories;

use App\Models\AdminGuru;
use App\Models\MapelKelas;
use App\Models\TahunAkademik;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $guru = AdminGuru::orderBy('nik_guru')->take(6)->pluck('nik_guru')->toArray();

        // $map = [
        //     'I' => $guru[0],
        //     'II' => $guru[1],
        //     'III' => $guru[2],
        //     'IV' => $guru[3],
        //     'V' => $guru[4],
        //     'VI' => $guru[5],
        // ];

        $tingkat_kelas = $this->faker->randomElement(['I / Satu' => 'I / Satu', 'II / Dua' => 'II / Dua', 'III / Tiga' => 'III / Tiga', 'IV / Empat' => 'IV / Empat', 'V / Lima' => 'V / Lima', 'VI / Enam' => 'VI / Enam']);

        // $mapelKelasId = MapelKelas::pluck('id')->toArray();
        $year = $this->faker->year;
        return [
            // 'nik_guru' => $map[$tingkat_kelas],
            'nik_guru' => function() {
                return AdminGuru::inRandomOrder()->first()->nik_guru;
            },
            // 'id_mapel_kelas' => $this->faker->randomDigit(),

            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'tanggal_mulai' => date('Y-m-d', strtotime("01-01-$year")),
            'tanggal_selesai' => date('Y-m-d', strtotime("30-06-" . ($year))),
            'tingkat_kelas' => $tingkat_kelas,
            'status' => $this->faker->boolean(),
        ];
    }
}
