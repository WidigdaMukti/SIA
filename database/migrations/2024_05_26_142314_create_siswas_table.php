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
            // $table->bigInteger('nik_guru')->nullable();
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('nik_siswa');
            $table->bigInteger('nisn')->nullable();
            $table->bigInteger('nipd')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            $table->integer('jumlah_saudara_tiri')->nullable();
            $table->integer('jumlah_saudara_angkat')->nullable();
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
            $table->string('no_tahun_surat_ket')->nullable();
            $table->integer('lama_belajar')->nullable();
            $table->string('skhun')->nullable();
            $table->string('penerima_kps')->nullable();
            $table->string('no_kps')->nullable();
            $table->string('no_peserta_ujian_nasional')->nullable();
            $table->string('no_seri_ijazah')->nullable();
            $table->string('penerima_kip')->nullable();
            $table->bigInteger('nomor_kip')->nullable();
            $table->string('nama_kip')->nullable();
            $table->string('no_kks')->nullable();
            $table->string('no_registrasi_akta_lahir')->nullable();
            $table->string('bank')->nullable();
            $table->bigInteger('no_rek_bank')->nullable();
            $table->string('rek_atas_nama')->nullable();
            $table->string('layak_pip')->nullable();
            $table->string('alasan_layak_pip')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            // $table->boolean('status_siswa');
            $table->timestamps();

            $table->foreign('nik_siswa')->references('nik')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null')->onUpdate('cascade');;
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
