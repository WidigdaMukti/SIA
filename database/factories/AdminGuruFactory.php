<?php

namespace Database\Factories;

use App\Models\MapelKelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminGuru>
 */
class AdminGuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'nik_guru' => function() {
            //     return User::inRandomOrder()->first()->nik;
            // },
            'nik_guru' => $this->faker->randomNumber(9),
            'nuptk' => $this->faker->randomNumber(),
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'nip' => $this->faker->randomNumber(),
            'status_kepegawaian' => $this->faker->randomElement(['GTY/PTY', 'Guru Honor Sekolah']),
            'jenis_ptk' => $this->faker->randomElement(['Guru Mapel', 'Guru Kelas']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'alamat_rumah' => $this->faker->address,
            'no_hp' => $this->faker->randomNumber(),
            'email' => $this->faker->email,
            'tugas_tambahan' => $this->faker->jobTitle,
            'sk_cpns' => $this->faker->randomNumber(),
            'tanggal_cpns' => $this->faker->date,
            'sk_pengangkatan' => $this->faker->randomNumber(),
            'tmt_pengangkatan' => $this->faker->date,
            'lembaga_pengangkatan' => $this->faker->company,
            'pangkat_golongan' => $this->faker->randomElement(['III/a', 'III/b', 'III/c', 'III/d']),
            'sumber_gaji' => $this->faker->randomElement(['Pemerintah', 'Swasta', 'Yayasan']),
            'nama_ibu_kandung' => $this->faker->name('female'),
            'status_perkawinan' => $this->faker->randomElement(['Belum Menikah', 'Menikah']),
            'nama_suami_atau_istri' => $this->faker->name,
            'nip_suami_atau_istri' => $this->faker->randomNumber(),
            'pekerjaan_suami_atau_istri' => $this->faker->jobTitle,
            'tmt_pns' => $this->faker->date,
            'lisensi_kepsek' => $this->faker->randomElement(['Ya', 'Tidak']),
            'diklat_kepegawaian' => $this->faker->randomElement(['Ya', 'Tidak']),
            'keahlian_braille' => $this->faker->randomElement(['Ya', 'Tidak']),
            'keahlian_bahasa_isyarat' => $this->faker->randomElement(['Ya', 'Tidak']),
            'npwp' => $this->faker->randomNumber(),
            'nama_wajib_pajak' => $this->faker->name,
            'kewarganegaraan' => $this->faker->country,
            'bank' => $this->faker->randomElement(['BCA', 'BRI', 'Mandiri']),
            'norek_bank' => $this->faker->bankAccountNumber,
            'rek_anama' => $this->faker->name,
            'no_kk' => $this->faker->randomNumber(),
            'karpeg' => $this->faker->randomElement(['Ya', 'Tidak']),
            'karis_karsu' => $this->faker->randomElement(['Ya', 'Tidak']),
            'nuks' => $this->faker->randomElement(['Ya', 'Tidak']),
            // 'status_admin_guru' => $this->faker->boolean()
        ];
    }
}
