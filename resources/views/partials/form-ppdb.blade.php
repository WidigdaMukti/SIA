<div class="col-4 d-none d-md-block">
    <nav id="navbar-pendaftaran" class=" h-100 flex-column align-items-stretch px-4 pt-5 border-end">
        <nav class="nav nav-pills flex-column sticky-top custom-sticky">
            <a class="nav-link" href="#item-1">Identitas Anak</a>
            <a class="nav-link" href="#item-2">Identitas Orang Tua/Wali</a>
            <nav class="nav nav-pills flex-column">
                <a class="nav-link ms-3 my-1" href="#item-2-1">Identitas Ayah</a>
                <a class="nav-link ms-3 my-1" href="#item-2-2">Identitas Ibu</a>
            </nav>
            <a class="nav-link" href="#item-3">Konfirmasi pendfataran</a>
        </nav>
    </nav>
</div>
<div class="col">
    <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
        class="scrollspy-example-2 p-4 pt-5" tabindex="0">
        <form class="row g-3" action="{{ route('ppdb.store') }}" method="POST">
            @csrf
            <div id="item-1">
                <h2 class="mb-4 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Identitas Anak</h2>
                <div class="row mb-4">
                    <label for="nama_lengkap" class="form-label col-md-4">Nama Lengkap</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                            id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="nik" class="form-label col-md-4">NIK</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" placeholder="NIK" value="{{ old('nik') }}" required>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="alamat" class="form-label col-md-4">Alamat Anak</label>
                    <div class="col-md-8">
                        <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                            placeholder="Alamat Anak" type="text" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="jenis_kelamin" class="form-label col-md-4">Jenis Kelamin</label>
                    <div class="col-md-8">
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin" aria-label="Jenis Kelamin" value="{{ old('jenis_kelamin') }}" required>
                            <option selected disabled value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki
                            </option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="tempat_lahir" class="form-label col-md-4">Tempat Lahir</label>
                    <div class="col-md-8">
                        <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text"
                            id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                            value="{{ old('tempat_lahir') }}" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="tanggal_lahir" class="form-label col-md-4">Tanggal Lahir</label>
                    <div class="col-md-8">
                        <div class="date">
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="agama" class="form-label col-md-4">Agama</label>
                    <div class="col-md-8">
                        <input class="form-control @error('agama') is-invalid @enderror" type="text"
                            id="agama" name="agama" placeholder="Agama" value="{{ old('agama') }}" required>
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="kewarganegaraan" class="form-label col-md-4">Kewarganegaraan</label>
                    <div class="col-md-8">
                        <select class="form-select @error('kewarganegaraan') is-invalid @enderror"
                            id="kewarganegaraan" name="kewarganegaraan" aria-label="Kewarganegaraan"required>
                            <option selected disabled value="">Pilih Kewarganegaraan</option>
                            <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI
                            </option>
                            <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA
                            </option>
                            <option value="Keturunan" {{ old('kewarganegaraan') == 'Keturunan' ? 'selected' : '' }}>
                                Keturunan</option>
                        </select>
                        @error('kewarganegaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="anak_ke" class="form-label col-md-4">Anak Ke</label>
                    <div class="col-md-8">
                        <input class="form-control @error('anak_ke') is-invalid @enderror" id="anak_ke"
                            name="anak_ke" placeholder="Anak Ke" type="number" value="{{ old('anak_ke') }}"
                            required>
                        @error('anak_ke')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="jumlah_saudara_kandung" class="form-label col-md-4">Jumlah Saudara Kandung</label>
                    <div class="col-md-8">
                        <input class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror"
                            type="number" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung"
                            placeholder="Jumlah Saudara Kandung" value="{{ old('jumlah_saudara_kandung') }}"
                            required>
                        @error('jumlah_saudara_kandung')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="berat_badan" class="form-label col-md-4">Berat Badan</label>
                    <div class="col-md-8">
                        <input class="form-control @error('berat_badan') is-invalid @enderror" id="berat_badan"
                            name="berat_badan" placeholder="Berat Badan" type="number"
                            value="{{ old('berat_badan') }}" required>
                        @error('berat_badan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="tinggi_badan" class="form-label col-md-4">Tinggi Badan</label>
                    <div class="col-md-8">
                        <input class="form-control @error('tinggi_badan') is-invalid @enderror" id="tinggi_badan"
                            name="tinggi_badan" placeholder="Tinggi Badan" type="number"
                            value="{{ old('tinggi_badan') }}" required>
                        @error('tinggi_badan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="golongan_darah" class="form-label col-md-4">Golongan Darah</label>
                    <div class="col-md-8">
                        <select class="form-select @error('golongan_darah') is-invalid @enderror" id="golongan_darah"
                            name="golongan_darah" aria-label="Golongan Darah" required>
                            <option selected disabled value="">Pilih Golongan Darah</option>
                            <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                        @error('golongan_darah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div id="item-2">
                <h2 class="mb-4 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Identitas Orangtua
                    atau Wali
                </h2>
                <div id="item-2-1">
                    <h5 class="mb-3 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Ayah atau Wali
                    </h5>
                    <div class="row mb-4">
                        <label for="nama_ayah" class="form-label col-md-4">Nama Ayah</label>
                        <div class="col-md-8">
                            <input class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                                name="nama_ayah" placeholder="Nama Ayah" type="text"
                                value="{{ old('nama_ayah') }}">
                            @error('nama_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="pekerjaan_ayah" class="form-label col-md-4">Pekerjaan Ayah</label>
                        <div class="col-md-8">
                            <input class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah"
                                type="text" value="{{ old('pekerjaan_ayah') }}">
                            @error('pekerjaan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tempat_lahir_ayah" class="form-label col-md-4">Tempat Lahir Ayah</label>
                        <div class="col-md-8">
                            <input class="form-control @error('tempat_lahir_ayah') is-invalid @enderror"
                                id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah"
                                type="text" value="{{ old('tempat_lahir_ayah') }}">
                            @error('tempat_lahir_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tanggal_lahir_ayah" class="form-label col-md-4">Tanggal Lahir Ayah</label>
                        <div class="col-md-8">
                            <input type="date"
                                class="form-control @error('tanggal_lahir_ayah') is-invalid @enderror"
                                id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                                value="{{ old('tanggal_lahir_ayah') }}">
                            @error('tanggal_lahir_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="agama_ayah" class="form-label col-md-4">Agama Ayah</label>
                        <div class="col-md-8">
                            <input class="form-control @error('agama_ayah') is-invalid @enderror" id="agama_ayah"
                                name="agama_ayah" placeholder="Agama Ayah" type="text"
                                value="{{ old('agama_ayah') }}">
                            @error('agama_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="pekerjaan_ayah" class="form-label col-md-4">Pekerjaan Ayah</label>
                        <div class="col-md-8">
                            <input class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah"
                                type="text" value="{{ old('pekerjaan_ayah') }}">
                            @error('pekerjaan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="pendidikan_terakhir_ayah" class="form-label col-md-4">Pendidikan Ayah</label>
                        <div class="col-md-8">
                            <select class="form-select @error('pendidikan_terakhir_ayah') is-invalid @enderror"
                                id="pendidikan_terakhir_ayah" name="pendidikan_terakhir_ayah"
                                aria-label="Pendidikan Ayah">
                                <option selected disabled value="">Pilih Pendidikan Ayah</option>
                                <option value="Tidak Sekolah"
                                    {{ old('pendidikan_terakhir_ayah') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak
                                    Sekolah</option>
                                <option value="SD Sederajat"
                                    {{ old('pendidikan_terakhir_ayah') == 'SD Sederajat' ? 'selected' : '' }}>
                                    SD Sederajat</option>
                                <option value="SMP Sederajat"
                                    {{ old('pendidikan_terakhir_ayah') == 'SMP Sederajat' ? 'selected' : '' }}>
                                    SMP Sederajat</option>
                                <option value="SMA Sederajat"
                                    {{ old('pendidikan_terakhir_ayah') == 'SMA Sederajat' ? 'selected' : '' }}>
                                    SMA Sederajat</option>
                                <option value="Diploma"
                                    {{ old('pendidikan_terakhir_ayah') == 'Diploma' ? 'selected' : '' }}>
                                    Diploma
                                </option>
                                <option value="Sarjana"
                                    {{ old('pendidikan_terakhir_ayah') == 'Sarjana' ? 'selected' : '' }}>
                                    Sarjana
                                </option>
                            </select>
                            @error('pendidikan_terakhir_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="gaji_perbulan_ayah" class="form-label col-md-4">Penghasilan Ayah</label>
                        <div class="col-md-8">
                            <select class="form-select @error('gaji_perbulan_ayah') is-invalid @enderror"
                                id="gaji_perbulan_ayah" name="gaji_perbulan_ayah" aria-label="Penghasilan Ayah">
                                <option selected disabled value="">Pilih Penghasilan Ayah</option>
                                <option value="Tidak Berpenghasilan"
                                    {{ old('gaji_perbulan_ayah') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak
                                    Berpenghasilan
                                </option>
                                <option value="Kurang dari Rp. 500.000"
                                    {{ old('gaji_perbulan_ayah') == 'Kurang dari Rp. 500.000' ? 'selected' : '' }}>
                                    Kurang dari Rp. 500.000
                                </option>
                                <option value="Rp. 500.000 - Rp. 999.999"
                                    {{ old('gaji_perbulan_ayah') == 'Rp. 500.000 - Rp. 999.999' ? 'selected' : '' }}>
                                    Rp. 500.000 - Rp. 999.999
                                </option>
                                <option value="Rp. 1.000.000 - Rp. 1.999.999"
                                    {{ old('gaji_perbulan_ayah') == 'Rp. 1.000.000 - Rp. 1.999.999' ? 'selected' : '' }}>
                                    Rp. 1.000.000 - Rp. 1.999.999
                                </option>
                                <option value="Rp. 2.000.000 - Rp. 4.999.999"
                                    {{ old('gaji_perbulan_ayah') == 'Rp. 2.000.000 - Rp. 4.999.999' ? 'selected' : '' }}>
                                    Rp. 2.000.000 - Rp. 4.999.999
                                </option>
                                <option value="Rp. 5.000.000 - Rp. 20.000.000"
                                    {{ old('gaji_perbulan_ayah') == 'Rp. 5.000.000 - Rp. 20.000.000' ? 'selected' : '' }}>
                                    Rp. 5.000.000 - Rp. 20.000.000
                                </option>
                                <option value="Lebih Dari Rp. 20.000.000"
                                    {{ old('gaji_perbulan_ayah') == 'Lebih Dari Rp. 20.000.000' ? 'selected' : '' }}>
                                    Lebih Dari Rp. 20.000.000
                                </option>
                            </select>
                            @error('gaji_perbulan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="alamat_rumah_ibu" class="form-label col-md-4">Alamat Ayah</label>
                        <div class="col-md-8">
                            <input class="form-control @error('alamat_rumah_ibu') is-invalid @enderror"
                                id="alamat_rumah_ibu" name="alamat_rumah_ibu" placeholder="alamat rumah Ayah"
                                type="text" value="{{ old('alamat_rumah_ibu') }}">
                            @error('alamat_rumah_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="kewarganegaraan_ayah" class="form-label col-md-4">Kewarganegaraan</label>
                        <div class="col-md-8">
                            <select class="form-select @error('kewarganegaraan_ayah') is-invalid @enderror"
                                id="kewarganegaraan_ayah" name="kewarganegaraan_ayah"
                                aria-label="kewarganegaraan_ayah">
                                <option selected disabled value="">Pilih Kewarganegaraan</option>
                                <option value="WNI" {{ old('kewarganegaraan_ayah') == 'WNI' ? 'selected' : '' }}>
                                    WNI
                                </option>
                                <option value="WNA" {{ old('kewarganegaraan_ayah') == 'WNA' ? 'selected' : '' }}>
                                    WNA
                                </option>
                                <option value="Keturunan"
                                    {{ old('kewarganegaraan_ayah') == 'Keturunan' ? 'selected' : '' }}>
                                    Keturunan</option>
                            </select>
                            @error('kewarganegaraan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="nomor_telepon_hp_ayah" class="form-label col-md-4">Nomor Telepon Ayah</label>
                        <div class="col-md-8">
                            <input type="number"
                                class="form-control @error('nomor_telepon_hp_ayah') is-invalid @enderror"
                                id="nomor_telepon_hp_ayah" name="nomor_telepon_hp_ayah"
                                placeholder="Nomor Telepon Ayah" value="{{ old('nomor_telepon_hp_ayah') }}">
                            @error('nomor_telepon_hp_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="item-2-2">
                    <h5 class="mb-3 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Ibu atau Wali
                    </h5>
                    <div class="row mb-4">
                        <label for="nama_ibu" class="form-label col-md-4">Nama Ibu</label>
                        <div class="col-md-8">
                            <input class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                                name="nama_ibu" placeholder="Nama Ibu" type="text"
                                value="{{ old('nama_ibu') }}">
                            @error('nama_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="pekerjaan_ibu" class="form-label col-md-4">Pekerjaan Ibu</label>
                        <div class="col-md-8">
                            <input class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" type="text"
                                value="{{ old('pekerjaan_ibu') }}">
                            @error('pekerjaan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tempat_lahir_ibu" class="form-label col-md-4">Tempat Lahir Ibu</label>
                        <div class="col-md-8">
                            <input class="form-control @error('tempat_lahir_ibu') is-invalid @enderror"
                                id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu"
                                type="text" value="{{ old('tempat_lahir_ibu') }}">
                            @error('tempat_lahir_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tanggal_lahir_ibu" class="form-label col-md-4">Tanggal Lahir Ibu</label>
                        <div class="col-md-8">
                            <input type="date"
                                class="form-control @error('tanggal_lahir_ibu') is-invalid @enderror"
                                id="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') }}"
                                name="tanggal_lahir_ibu">
                            @error('tanggal_lahir_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="agama_ibu" class="form-label col-md-4">Agama Ibu</label>
                        <div class="col-md-8">
                            <input class="form-control @error('agama_ibu') is-invalid @enderror" id="agama_ibu"
                                name="agama_ibu" placeholder="Agama Ibu" type="text"
                                value="{{ old('agama_ibu') }}">
                            @error('agama_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="pekerjaan_ibu" class="form-label col-md-4">Pekerjaan Ibu</label>
                        <div class="col-md-8">
                            <input class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" type="text"
                                value="{{ old('pekerjaan_ibu') }}">
                            @error('pekerjaan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="pendidikan_terakhir_ibu" class="form-label col-md-4">Pendidikan Ibu</label>
                        <div class="col-md-8">
                            <select class="form-select @error('pendidikan_terakhir_ibu') is-invalid @enderror"
                                id="pendidikan_terakhir_ibu" name="pendidikan_terakhir_ibu"
                                aria-label="Pendidikan Ibu" value="{{ old('pendidikan_terakhir_ibu') }}">
                                <option value="Tidak Sekolah"
                                    {{ old('pendidikan_terakhir_ibu') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak
                                    Sekolah</option>
                                <option value="SD Sederajat"
                                    {{ old('pendidikan_terakhir_ibu') == 'SD Sederajat' ? 'selected' : '' }}>
                                    SD Sederajat</option>
                                <option value="SMP Sederajat"
                                    {{ old('pendidikan_terakhir_ibu') == 'SMP Sederajat' ? 'selected' : '' }}>
                                    SMP Sederajat</option>
                                <option value="SMA Sederajat"
                                    {{ old('pendidikan_terakhir_ibu') == 'SMA Sederajat' ? 'selected' : '' }}>
                                    SMA Sederajat</option>
                                <option value="Diploma"
                                    {{ old('pendidikan_terakhir_ibu') == 'Diploma' ? 'selected' : '' }}>
                                    Diploma
                                </option>
                                <option value="Sarjana"
                                    {{ old('pendidikan_terakhir_ibu') == 'Sarjana' ? 'selected' : '' }}>
                                    Sarjana
                                </option>
                            </select>
                            @error('pendidikan_terakhir_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="gaji_perbulan_ibu" class="form-label col-md-4">Penghasilan Ibu</label>
                        <div class="col-md-8">
                            <select class="form-select @error('gaji_perbulan_ibu') is-invalid @enderror"
                                id="gaji_perbulan_ibu" name="gaji_perbulan_ibu" aria-label="Penghasilan Ibu"
                                value="{{ old('gaji_perbulan_ibu') }}">
                                <option selected disabled value="">Pilih Penghasilan Ibu</option>
                                <option value="Tidak Berpenghasilan"
                                    {{ old('gaji_perbulan_ibu') == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak
                                    Berpenghasilan
                                </option>
                                <option value="Kurang dari Rp. 500.000"
                                    {{ old('gaji_perbulan_ibu') == 'Kurang dari Rp. 500.000' ? 'selected' : '' }}>
                                    Kurang dari Rp. 500.000
                                </option>
                                <option value="Rp. 500.000 - Rp. 999.999"
                                    {{ old('gaji_perbulan_ibu') == 'Rp. 500.000 - Rp. 999.999' ? 'selected' : '' }}>
                                    Rp. 500.000 - Rp. 999.999
                                </option>
                                <option value="Rp. 1.000.000 - Rp. 1.999.999"
                                    {{ old('gaji_perbulan_ibu') == 'Rp. 1.000.000 - Rp. 1.999.999' ? 'selected' : '' }}>
                                    Rp. 1.000.000 - Rp. 1.999.999
                                </option>
                                <option value="Rp. 2.000.000 - Rp. 4.999.999"
                                    {{ old('gaji_perbulan_ibu') == 'Rp. 2.000.000 - Rp. 4.999.999' ? 'selected' : '' }}>
                                    Rp. 2.000.000 - Rp. 4.999.999
                                </option>
                                <option value="Rp. 5.000.000 - Rp. 20.000.000"
                                    {{ old('gaji_perbulan_ibu') == 'Rp. 5.000.000 - Rp. 20.000.000' ? 'selected' : '' }}>
                                    Rp. 5.000.000 - Rp. 20.000.000
                                </option>
                                <option value="Lebih Dari Rp. 20.000.000"
                                    {{ old('gaji_perbulan_ibu') == 'Lebih Dari Rp. 20.000.000' ? 'selected' : '' }}>
                                    Lebih Dari Rp. 20.000.000
                                </option>
                            </select>
                            @error('gaji_perbulan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="alamat_rumah_ibu" class="form-label col-md-4">Alamat Ibu</label>
                        <div class="col-md-8">
                            <input class="form-control @error('alamat_rumah_ibu') is-invalid @enderror"
                                id="alamat_rumah_ibu" name="alamat_rumah_ibu" placeholder="Alamat Ibu"
                                type="text" value="{{ old('alamat_rumah_ibu') }}">
                            @error('alamat_rumah_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="kewarganegaraan_ibu" class="form-label col-md-4">Kewarganegaraan</label>
                        <div class="col-md-8">
                            <select class="form-select @error('kewarganegaraan_ibu') is-invalid @enderror"
                                id="kewarganegaraan_ibu" name="kewarganegaraan_ibu" aria-label="kewarganegaraan_ibu">
                                <option selected disabled value="">Pilih Kewarganegaraan</option>
                                <option value="WNI"
                                    {{ old('kewarganegaraan_kewarganegaraan_ibuayah') == 'WNI' ? 'selected' : '' }}>
                                    WNI
                                </option>
                                <option value="WNA" {{ old('kewarganegaraan_ibu') == 'WNA' ? 'selected' : '' }}>
                                    WNA
                                </option>
                                <option value="Keturunan"
                                    {{ old('kewarganegaraan_ibu') == 'Keturunan' ? 'selected' : '' }}>
                                    Keturunan</option>
                            </select>
                            @error('kewarganegaraan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="nomor_telepon_hp_ibu" class="form-label col-md-4">Nomor Telepon Ibu</label>
                        <div class="col-md-8">
                            <input type="number"
                                class="form-control @error('nomor_telepon_hp_ibu') is-invalid @enderror"
                                id="nomor_telepon_hp_ibu" name="nomor_telepon_hp_ibu" placeholder="Nomor Telepon Ibu"
                                value="{{ old('nomor_telepon_hp_ibu') }}">
                            @error('nomor_telepon_hp_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="item-3">
                    <h2 class="mb-4 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Konfirmasi
                        Pendaftaran
                        PPDB Online
                        SDIT Alqudwah
                    </h2>
                    <h4 class="responsive-text-head-1" style="font-weight: bold;">Harap Diperhatikan Setelah Mengisi
                        Formulir
                    </h4>
                    <ul>
                        <li>Setelah mengisi formulir ini, silakan tunggu konfirmasi lebih lanjut dari kami melalui nomor
                            telepon yang Anda masukkan.<span style="color:red;">*</span></li>
                        <li>Setelah dinyatakan lanjut kedalam proses validasi, lampirkan dokumen tambahan dibawah
                            ini<span style="color:red;">*</span></li>
                        <ul>
                            <li>Fotokopi Akte Kelahiran (2 lembar)</li>
                            <li>Fotokopi Kartu Keluarga (2 lembar)</li>
                            <li>Fotokopi KTP Orang Tua (2 lembar)</li>
                            <li>Pas Foto Calon Siswa (3x4 cm)</li>
                        </ul>
                    </ul>
                    <p class="mb-3">
                        Isi nomor Telepon atau HP yang dapat dihubungi untuk
                        mendapatkan bukti pendaftaran dan konfirmasi lebih lanjut dari kami <span
                            style="color:red;">*</span>
                    </p>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror"
                                id="nomor_telepon" name="nomor_telepon"
                                placeholder="Nomor Telepon yang Dapat Dihubungi" value="{{ old('nomor_telepon') }}"
                                required>
                            @error('nomor_telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <button type="submit" value="submit" class="btn w-100 mb-5 submit-style"
                                style="background-color: #3c6255; color: white;">Kirim Pendaftaran</button>
                        </div>
                    </div>

                </div>
        </form>
    </div>
</div>
