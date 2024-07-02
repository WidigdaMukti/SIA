<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raport Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .card-header {
            font-weight: bold;
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .card-content {
            padding: 10px;
        }

        .row {
            margin-bottom: 10px;
        }

        .col-4, .col-1, .col-7 {
            padding: 5px;
        }

        .col-4 {
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        col-card-content {
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Raport {{ $dataRaport->siswa->nama_lengkap }}</h1>

        <!-- Biodata Siswa -->
        <div class="card">
            <div class="card-header">Biodata Siswa</div>
            <div class="card-content">
                <div class="row">
                    <div class="col-card-content">
                        <div class="row">
                            <div class="col-4"><strong>Nama</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->nama_lengkap }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>NISN</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->nisn }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>No Telepon</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->nomor_telepon }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>Alamat</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->alamat }}</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-4"><strong>Kelas</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->kelas->tingkat_kelas }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>Semester</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->kelas->semester }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>Tahun Pelajaran</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ date('Y', strtotime($dataRaport->siswa->kelas->tanggal_mulai)) }}/{{ date('Y', strtotime($dataRaport->siswa->kelas->tanggal_selesai)) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4"><strong>Wali Kelas</strong></div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $dataRaport->siswa->kelas->adminGuru->nama_lengkap_tendik }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai dan Capaian Kompetensi -->
        <div class="card">
            <div class="card-header">Nilai dan Capaian Kompetensi</div>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">KKM</th>
                            <th scope="col">Nilai Akhir</th>
                            <th scope="col">Capaian Kompetensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRaport->mapelRaport as $index => $mapel)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mapel->nama_mapel }}</td>
                            <td>{{ $mapel->kkm }}</td>
                            <td>{{ $mapel->nilai_akhir }}</td>
                            <td>{{ $mapel->capaian_kompetensi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ekstrakulikuler -->
        <div class="card">
            <div class="card-header">Ekstrakulikuler</div>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kegiatan Ekstrakulikuler</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRaport->ekskulRaport as $index => $ekskul)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ekskul->nama }}</td>
                            <td>{{ $ekskul->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Ketidakhadiran -->
        <div class="card">
            <div class="card-header">Ketidakhadiran</div>
            <div class="card-content">
                <div>
                    <strong>Sakit:</strong> {{ $dataRaport->sakit }}<br>
                    <strong>Izin:</strong> {{ $dataRaport->izin }}<br>
                    <strong>Tanpa Keterangan:</strong> {{ $dataRaport->tanpa_keterangan }}<br>
                </div>
            </div>
        </div>

        <!-- Catatan Wali Kelas -->
        <div class="card">
            <div class="card-header">Catatan Wali Kelas</div>
            <div class="card-content">
                <p>{{ $dataRaport->catatan_wali_kelas }}</p>
            </div>
        </div>
    </div>
</body>
</html>
