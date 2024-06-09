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
            $table->unsignedBigInteger('nik_guru')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->bigInteger('nuptk')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->unique();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->string('jenis_ptk')->nullable();
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
            $table->bigInteger('nip_suami_atau_istri')->nullable();
            $table->string('pekerjaan_suami_atau_istri')->nullable();
            $table->string('tmt_pns')->nullable();
            $table->string('lisensi_kepsek')->nullable();
            $table->string('diklat_kepegawaian')->nullable();
            $table->string('keahlian_braille')->nullable();
            $table->string('keahlian_bahasa_isyarat')->nullable();
            $table->bigInteger('npwp')->nullable();
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('bank')->nullable();
            $table->bigInteger('norek_bank')->nullable();
            $table->string('rek_anama')->nullable();
            $table->string('karpeg')->nullable();
            $table->string('karis_karsu')->nullable();
            $table->string('nuks')->nullable();
            // $table->boolean('status_admin_guru');
            $table->timestamps();

            $table->foreign('nik_guru')->references('nik')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
