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
        Schema::create('admin_gurus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_role')->nullable();
            $table->unsignedBigInteger('nik_guru');
            $table->integer('nuptk')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('nip')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('jenis_ptk')->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->integer('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('tugas_tambahan')->nullable();
            $table->string('sk_cpns')->nullable();
            $table->string('tanggal_cpns')->nullable();
            $table->string('sk_pengangkatan')->nullable();
            $table->string('tmt_pengangkatan')->nullable();
            $table->string('lembaga_pengangkatan')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('nama_suami_atau_istri')->nullable();
            $table->integer('nip_suami_atau_istri')->nullable();
            $table->string('pekerjaan_suami_atau_istri')->nullable();
            $table->string('tmt_pns')->nullable();
            $table->string('lisensi_kepsek')->nullable();
            $table->string('diklat_kepegawaian')->nullable();
            $table->string('keahlian_braille')->nullable();
            $table->string('keahlian_bahasa_isyarat')->nullable();
            $table->integer('npwp')->nullable();
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('bank')->nullable();
            $table->bigInteger('norek_bank')->nullable();
            $table->string('rek_anama')->nullable();
            $table->integer('no_kk')->nullable();
            $table->string('karpeg')->nullable();
            $table->string('karis_karsu')->nullable();
            $table->integer('nuks')->nullable();
            $table->integer('id_kelas_mengajar')->nullable();
            $table->timestamps();

            $table->foreign('nik_guru')->references('nik')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_gurus');
    }
};
