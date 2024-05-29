<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik_siswa');
            $table->integer('id_role');
            $table->integer('nik_guru')->nullable();
            $table->integer('nisn')->nullable();
            $table->integer('nipd')->nullable();
            $table->integer('no_kk')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            $table->integer('jumlah_saudara_tiri')->nullable();
            $table->string('bahasa_sehari-hari')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->string('gol_darah')->nullable();
            $table->text('alamat')->nullable();
            $table->string('alat_transportasi')->nullable();
            $table->bigInteger('nomor_telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('bertempat_tinggal')->nullable();
            $table->string('masuk_sekolah_sebagai')->nullable();
            $table->string('asal_anak')->nullable();
            $table->string('nama_tk')->nullable();
            $table->integer('no_tahun_surat_ket')->nullable();
            $table->integer('lama_belajar')->nullable();
            $table->integer('skhun')->nullable();
            $table->string('penerima_kps')->nullable();
            $table->integer('no_kps')->nullable();
            $table->integer('no_peserta_ujian_nasional')->nullable();
            $table->integer('no_seri_ijazah')->nullable();
            $table->string('penerima_kip')->nullable();
            $table->integer('nomor_kip')->nullable();
            $table->string('nama_kip')->nullable();
            $table->string('no_kks')->nullable();
            $table->string('no_registrasi_akta_lahir')->nullable();
            $table->string('bank')->nullable();
            $table->integer('no_rek_bank')->nullable();
            $table->string('rek_atas_nama')->nullable();
            $table->string('layak_pip')->nullable();
            $table->string('alasan_layak_pip')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->integer('id_kelas')->nullable();
            $table->timestamps();

            $table->foreign('nik_siswa')->references('nik')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
