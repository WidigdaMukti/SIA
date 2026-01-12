<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - {{ $ppdb->nama_lengkap }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        .section-title { background: #f0f0f0; font-weight: bold; padding: 5px; }
    </style>
</head>
<body>
    <h1>Formulir PPDB</h1>
    <h2>{{ $ppdb->nama_lengkap }}</h2>

    <h3 class="section-title">Biodata Peserta</h3>
    <table>
        <tr><td>NIK</td><td>{{ $ppdb->nik }}</td></tr>
        <tr><td>Nama Lengkap</td><td>{{ $ppdb->nama_lengkap }}</td></tr>
        <tr><td>Jenis Kelamin</td><td>{{ $ppdb->jenis_kelamin }}</td></tr>
        <tr><td>Tempat / Tanggal Lahir</td><td>{{ $ppdb->tempat_lahir }}, {{ $ppdb->tanggal_lahir }}</td></tr>
        <tr><td>Agama</td><td>{{ $ppdb->agama }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>{{ $ppdb->kewarganegaraan }}</td></tr>
        <tr><td>Jumlah Saudara Kandung</td><td>{{ $ppdb->jumlah_saudara_kandung }}</td></tr>
        <tr><td>Jumlah Saudara Tiri</td><td>{{ $ppdb->jumlah_saudara_tiri }}</td></tr>
        <tr><td>Jumlah Saudara Angkat</td><td>{{ $ppdb->jumlah_saudara_angkat }}</td></tr>
        <tr><td>Bahasa Sehari-hari</td><td>{{ $ppdb->bahasa_sehari_hari }}</td></tr>
        <tr><td>Berat / Tinggi Badan</td><td>{{ $ppdb->berat_badan }} kg / {{ $ppdb->tinggi_badan }} cm</td></tr>
        <tr><td>Golongan Darah</td><td>{{ $ppdb->golongan_darah }}</td></tr>
        <tr><td>Alamat</td><td>{{ $ppdb->alamat }}</td></tr>
        <tr><td>Bertempat Tinggal</td><td>{{ $ppdb->bertempat_tinggal }}</td></tr>
        <tr><td>Masuk Sekolah Sebagai</td><td>{{ $ppdb->masuk_sekolah_sebagai }}</td></tr>
        <tr><td>Asal Anak</td><td>{{ $ppdb->asal_anak }}</td></tr>
        <tr><td>Nama TK</td><td>{{ $ppdb->nama_tk }}</td></tr>
        <tr><td>No Tahun Surat Keterangan</td><td>{{ $ppdb->nomor_tahun_surat_keterangan }}</td></tr>
        <tr><td>Lama Belajar</td><td>{{ $ppdb->lama_belajar }} Tahun</td></tr>
    </table>

    <h3 class="section-title">Data Ayah / Wali</h3>
    <table>
        <tr><td>Nama Ayah</td><td>{{ $ppdb->nama_ayah }}</td></tr>
        <tr><td>Tempat / Tanggal Lahir</td><td>{{ $ppdb->tempat_lahir_ayah }}, {{ $ppdb->tanggal_lahir_ayah }}</td></tr>
        <tr><td>Agama</td><td>{{ $ppdb->agama_ayah }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>{{ $ppdb->kewarganegaraan_ayah }}</td></tr>
        <tr><td>Pendidikan Terakhir</td><td>{{ $ppdb->pendidikan_terakhir_ayah }}</td></tr>
        <tr><td>Pekerjaan</td><td>{{ $ppdb->pekerjaan_ayah }}</td></tr>
        <tr><td>Gaji Perbulan</td><td>{{ $ppdb->gaji_perbulan_ayah }}</td></tr>
        <tr><td>Alamat Rumah</td><td>{{ $ppdb->alamat_rumah_ayah }}</td></tr>
        <tr><td>Alamat Kantor</td><td>{{ $ppdb->alamat_kantor_ayah }}</td></tr>
        <tr><td>No HP</td><td>{{ $ppdb->nomor_telepon_hp_ayah }}</td></tr>
    </table>

    <h3 class="section-title">Data Ibu / Wali</h3>
    <table>
        <tr><td>Nama Ibu</td><td>{{ $ppdb->nama_ibu }}</td></tr>
        <tr><td>Tempat / Tanggal Lahir</td><td>{{ $ppdb->tempat_lahir_ibu }}, {{ $ppdb->tanggal_lahir_ibu }}</td></tr>
        <tr><td>Agama</td><td>{{ $ppdb->agama_ibu }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>{{ $ppdb->kewarganegaraan_ibu }}</td></tr>
        <tr><td>Pendidikan Terakhir</td><td>{{ $ppdb->pendidikan_terakhir_ibu }}</td></tr>
        <tr><td>Pekerjaan</td><td>{{ $ppdb->pekerjaan_ibu }}</td></tr>
        <tr><td>Gaji Perbulan</td><td>{{ $ppdb->gaji_perbulan_ibu }}</td></tr>
        <tr><td>Alamat Rumah</td><td>{{ $ppdb->alamat_rumah_ibu }}</td></tr>
        <tr><td>Alamat Kantor</td><td>{{ $ppdb->alamat_kantor_ibu }}</td></tr>
        <tr><td>No HP</td><td>{{ $ppdb->nomor_telepon_hp_ibu }}</td></tr>
    </table>

</body>
</html>
