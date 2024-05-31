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

        $tingkat_kelas = $this->faker->randomElement(['I', 'II', 'III', 'IV', 'V', 'VI']);

        $tahun_akademik_id = TahunAkademik::pluck('id')->toArray();

        return [
            // 'nik_guru' => $map[$tingkat_kelas],
            'nik_guru' => function() {
                return AdminGuru::inRandomOrder()->first()->nik_guru;
            },
            'id_tahun_akademik' => $this->faker->randomElement($tahun_akademik_id),
            'tingkat_kelas' => $tingkat_kelas,
        ];
    }
}
