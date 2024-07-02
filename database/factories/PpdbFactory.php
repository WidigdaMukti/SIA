<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ppdb>
 */
class PpdbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['baru', 'pending', 'ditolak', 'diterima']);
        $nama_lengkap = $this->faker->name;
        $nik = $this->faker->randomNumber(9);
        $jenis_kelamin = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        $tempat_lahir = $this->faker->city;
        $tanggal_lahir = $this->faker->date;
        $agama = $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
        $kewarganegaraan = 'Indonesia'; // bisa disesuaikan dengan kebutuhan
        $anak_ke = $this->faker->numberBetween(1, 10);
        $jumlah_saudara_kandung = $this->faker->numberBetween(0, 10);
        $jumlah_saudara_tiri = $this->faker->numberBetween(0, 5);
        $jumlah_saudara_angkat = $this->faker->numberBetween(0, 3);
        $bahasa_sehari_hari = 'Indonesia'; // bisa disesuaikan dengan kebutuhan
        $berat_badan = $this->faker->randomFloat(2, 20, 100);
        $tinggi_badan = $this->faker->randomFloat(2, 100, 200);
        $golongan_darah = $this->faker->randomElement(['A', 'B', 'AB', 'O']);
        $alamat = $this->faker->address;
        $nomor_telepon = $this->faker->phoneNumber;
        $bertempat_tinggal = $this->faker->randomElement(['Bersama Orang Tua', 'Kost', 'Asrama']);
        $asal_anak = $this->faker->city;
        $masuk_sekolah_sebagai = $this->faker->randomElement(['Siswa Baru', 'Pindahan']);
        $nama_tk = $this->faker->company;
        $nomor_tahun_surat_keterangan = $this->faker->numerify('###/###/####');
        $lama_belajar = $this->faker->numberBetween(1, 12);
        $nama_ayah = $this->faker->name('male');
        $tempat_lahir_ayah = $this->faker->city;
        $tanggal_lahir_ayah = $this->faker->date;
        $agama_ayah = $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
        $kewarganegaraan_ayah = 'Indonesia'; // bisa disesuaikan dengan kebutuhan
        $pendidikan_terakhir_ayah = $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']);
        $pekerjaan_ayah = $this->faker->jobTitle;
        $gaji_perbulan_ayah = $this->faker->randomElement(['Kurang dari Rp 500.000.00', 'Rp 500.000.00 - Rp 999.000.00', 'Rp 1.000.000.00 - Rp 1.999.000.00', 'Rp 2.000.000.00 - Rp 4.000.000.00', 'Lebih dari Rp 4.000.000.00']);
        $alamat_rumah_ayah = $this->faker->address;
        $alamat_kantor_ayah = $this->faker->address;
        $nomor_telepon_hp_ayah = $this->faker->phoneNumber;
        $nama_ibu = $this->faker->name('female');
        $tempat_lahir_ibu = $this->faker->city;
        $tanggal_lahir_ibu = $this->faker->date;
        $agama_ibu = $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
        $kewarganegaraan_ibu = 'Indonesia'; // bisa disesuaikan dengan kebutuhan
        $pendidikan_terakhir_ibu = $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']);
        $pekerjaan_ibu = $this->faker->jobTitle;
        $gaji_perbulan_ibu = $this->faker->randomElement(['Kurang dari Rp 500.000.00', 'Rp 500.000.00 - Rp 999.000.00', 'Rp 1.000.000.00 - Rp 1.999.000.00', 'Rp 2.000.000.00 - Rp 4.000.000.00', 'Lebih dari Rp 4.000.000.00']);
        $alamat_rumah_ibu = $this->faker->address;
        $alamat_kantor_ibu = $this->faker->address;
        $nomor_telepon_hp_ibu = $this->faker->phoneNumber;

        $data = [
            'status' => $status,
            'nama_lengkap' => $nama_lengkap,
            'nik' => $nik,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'kewarganegaraan' => $kewarganegaraan,
            'anak_ke' => $anak_ke,
            'jumlah_saudara_kandung' => $jumlah_saudara_kandung,
            'jumlah_saudara_tiri' => $jumlah_saudara_tiri,
            'jumlah_saudara_angkat' => $jumlah_saudara_angkat,
            'bahasa_sehari_hari' => $bahasa_sehari_hari,
            'berat_badan' => $berat_badan,
            'tinggi_badan' => $tinggi_badan,
            'golongan_darah' => $golongan_darah,
            'alamat' => $alamat,
            'nomor_telepon' => $nomor_telepon,
            'bertempat_tinggal' => $bertempat_tinggal,
            'asal_anak' => $asal_anak,
            'masuk_sekolah_sebagai' => $masuk_sekolah_sebagai,
            'nama_tk' => $nama_tk,
            'nomor_tahun_surat_keterangan' => $nomor_tahun_surat_keterangan,
            'lama_belajar' => $lama_belajar,
            'nama_ayah' => $nama_ayah,
            'tempat_lahir_ayah' => $tempat_lahir_ayah,
            'tanggal_lahir_ayah' => $tanggal_lahir_ayah,
            'agama_ayah' => $agama_ayah,
            'kewarganegaraan_ayah' => $kewarganegaraan_ayah,
            'pendidikan_terakhir_ayah' => $pendidikan_terakhir_ayah,
            'pekerjaan_ayah' => $pekerjaan_ayah,
            'gaji_perbulan_ayah' => $gaji_perbulan_ayah,
            'alamat_rumah_ayah' => $alamat_rumah_ayah,
            'alamat_kantor_ayah' => $alamat_kantor_ayah,
            'nomor_telepon_hp_ayah' => $nomor_telepon_hp_ayah,
            'nama_ibu' => $nama_ibu,
            'tempat_lahir_ibu' => $tempat_lahir_ibu,
            'tanggal_lahir_ibu' => $tanggal_lahir_ibu,
            'agama_ibu' => $agama_ibu,
            'kewarganegaraan_ibu' => $kewarganegaraan_ibu,
            'pendidikan_terakhir_ibu' => $pendidikan_terakhir_ibu,
            'pekerjaan_ibu' => $pekerjaan_ibu,
            'gaji_perbulan_ibu' => $gaji_perbulan_ibu,
            'alamat_rumah_ibu' => $alamat_rumah_ibu,
            'alamat_kantor_ibu' => $alamat_kantor_ibu,
            'nomor_telepon_hp_ibu' => $nomor_telepon_hp_ibu,
        ];

        return $data;
    }
}
