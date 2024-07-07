<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $kelas = Kelas::factory(6)->create();
        // $id_kelas = $kelas->id;
        Kelas::factory()->create();

        return [
            // 'nik_siswa' => function() {
            //     return User::inRandomOrder()->first()->nik;
            // },
            // 'nik_siswa' => $this->faker->unique()->randomNumber(8),
            // 'id_kelas' => $id_kelas,
            // 'nik_guru' => $this->faker->randomNumber(8),
            'kelas_id' => function() {
                return Kelas::inRandomOrder()->first()->id;
            },
            'nik_siswa' => $this->faker->randomNumber(9),
            'nisn' => $this->faker->randomNumber(8),
            'nipd' => $this->faker->randomNumber(8),
            'no_kk' => $this->faker->randomNumber(8),
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA', 'Keturunan']),
            'anak_ke' => $this->faker->randomNumber(1),
            'jumlah_saudara_kandung' => $this->faker->randomNumber(1),
            'jumlah_saudara_tiri' => $this->faker->randomNumber(1),
            'jumlah_saudara_angkat' => $this->faker->randomNumber(1),
            'bahasa_sehari-hari' => $this->faker->languageCode,
            'berat_badan' => $this->faker->numberBetween(30, 100),
            'tinggi_badan' => $this->faker->numberBetween(100, 200),
            'gol_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'alamat' => $this->faker->address,
            'alat_transportasi' => $this->faker->randomElement(['Jalan Kaki', 'Sepeda', 'Motor', 'Mobil', 'Angkutan Umum', 'Ojek', 'Andong/Bendi/Sado/Dokar/Delman/Beca', 'Lainnya']),
            'nomor_telepon' => $this->faker->numerify('#############'),
            'email' => $this->faker->email,
            'bertempat_tinggal' => $this->faker->randomElement(['Bersama Orang Tua', 'Menumpang', 'Asrama']),
            'masuk_sekolah_sebagai' => $this->faker->randomElement(['Siswa Baru', 'Pindahan']),
            'asal_anak' => $this->faker->randomElement(['Rumah Tangga', 'Taman Kanak-kanak']),
            'nama_tk' => $this->faker->company,
            'no_tahun_surat_ket' => $this->faker->bothify('?????-#####'),
            'lama_belajar' => $this->faker->randomNumber(2),
            'skhun' => $this->faker->bothify('?????-#####'),
            'penerima_kps' => $this->faker->randomElement(['Ya', 'Tidak']),
            'no_kps' => $this->faker->bothify('?????-#####'),
            'no_peserta_ujian_nasional' => $this->faker->bothify('?????-#####'),
            'no_seri_ijazah' => $this->faker->bothify('?????-#####'),
            'penerima_kip' => $this->faker->randomElement(['Ya', 'Tidak']),
            'nomor_kip' => $this->faker->randomNumber(8),
            'nama_kip' => $this->faker->name,
            'no_kks' => $this->faker->bothify('?????-#####'),
            'no_registrasi_akta_lahir' => $this->faker->bothify('?????-#####'),
            'bank' => $this->faker->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
            'no_rek_bank' => $this->faker->randomNumber(8),
            'rek_atas_nama' => $this->faker->name,
            'layak_pip' => $this->faker->randomElement(['Ya', 'Tidak']),
            'alasan_layak_pip' => $this->faker->sentence,
            'kebutuhan_khusus' => $this->faker->randomElement(['Tidak', 'Netra', 'Rungu', 'Grahita Ringan', 'Grahita Sedang', 'Daksa Ringan', 'Daksa Sedang', 'Laras', 'Wicara', 'Tuna Ganda', 'Hiper Aktif', 'Cerdas Istimewa', 'Bakat Istimewa', 'Kesulitan Belajar', 'Narkoba', 'Indigo', 'Down Sindrome', 'Autis', 'Lainnya']),
            // 'status_siswa' => $this->faker->boolean(),
        ];
    }
}
