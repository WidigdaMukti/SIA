<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrangTua>
 */
class OrangTuaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'nik_siswa' => function() {
            //     $siswa = Siswa::factory()->create();
            //     return $siswa->nik;
            // },
            // 'nik_siswa' => $this->faker->unique()->randomNumber(8),
            'nik_siswa' => $this->faker->randomNumber(9),
            'nik_ayah' => $this->faker->numberBetween(100000, 999999),
            'nama_lengkap_ayah' => $this->faker->name,
            'tempat_lahir_ayah' => $this->faker->city,
            'tanggal_lahir_ayah' => $this->faker->date,
            'agama_ayah' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'kewarganegaraan_ayah' => $this->faker->country,
            'pendidikan_terakhir_ayah' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'pekerjaan_ayah' => $this->faker->jobTitle,
            'gaji_perbulan_ayah' => $this->faker->numberBetween(1000000, 10000000),
            'alamat_kantor_ayah' => $this->faker->address,
            'alamat_rumah_ayah' => $this->faker->address,
            'no_hp_ayah' => $this->faker->randomNumber(),
            'nik_wali' => $this->faker->numberBetween(100000, 999999),
            'nama_lengkap_wali' => $this->faker->name,
            'tempat_lahir_wali' => $this->faker->city,
            'tanggal_lahir_wali' => $this->faker->date,
            'agama_wali' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'kewarganegaraan_wali' => $this->faker->country,
            'pendidikan_terakhir_wali' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'pekerjaan_wali' => $this->faker->jobTitle,
            'gaji_wali_perbulan' => $this->faker->numberBetween(1000000, 10000000),
            'alamat_kantor_wali' => $this->faker->address,
            'alamat_rumah_wali' => $this->faker->address,
            'no_hp_wali' => $this->faker->randomNumber(),
            'nik_ibu' => $this->faker->numberBetween(100000, 999999),
            'nama_lengkap_ibu' => $this->faker->name,
            'tempat_lahir_ibu' => $this->faker->city,
            'tanggal_lahir_ibu' => $this->faker->date,
            'agama_ibu' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'kewarganegaraan_ibu' => $this->faker->country,
            'pendidikan_terakhir_ibu' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'pekerjaan_ibu' => $this->faker->jobTitle,
            'gaji_ibu_perbulan' => $this->faker->numberBetween(1000000, 10000000),
            'alamat_kantor_ibu' => $this->faker->address,
            'alamat_rumah_ibu' => $this->faker->address,
            'no_hp_ibu' => $this->faker->randomNumber(),
            // 'status_orang_tua' => $this->faker->boolean()
        ];
    }
}
