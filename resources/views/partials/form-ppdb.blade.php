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
        <form class="row g-3 needs-validation" novalidate>
            <div id="item-1">
                <h2 class="mb-4 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Identitas Anak</h2>
                <div class="row mb-4">
                    <label for="exampleFormControlInput1 validationCustom01" class="form-label col-md-4">
                        Nama Lengkap
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control " id="exampleFormControlInput1 validationCustom01"
                            placeholder="Nama Lengkap" required>
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="exampleFormControlInput2 validationCustom02" class="form-label col-md-4">NIK</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="exampleFormControlInput2 validationCustom02"
                            placeholder="NIK" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput3 validationCustom03" class="form-label col-md-4">Jenis
                        Kelamin</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlInput3 validationCustom03"
                            aria-label="Jenis Kelamin" required>
                            <option selected disabled value="">Pilih Jenis Kelamin</option>
                            <option value="1">Laki-Laki</option>
                            <option value="2">Permpuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput4 validationCustom04" class="form-label col-md-4">Tempat
                        Lahir</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="exampleFormControlInput4 validationCustom04"
                            placeholder="Tempat Lahir" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput5 validationCustom05" class="form-label col-md-4">Tanggal
                        lahir</label>
                    <div class="col-md-8">
                        <div class="input-group date">
                            <input type="date" class="form-control" id="exampleFormControlInput5 validationCustom05"
                                placeholder="Tanggal Lahir" required>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="bi bi-calendar-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput6 validationCustom06" class="form-label col-md-4">Agama</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="exampleFormControlInput6 validationCustom06"
                            placeholder="Agama" required>
                        <div id="" class="form-text" style="font-size: 0.8em;">Contoh: Islam</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput7 validationCustom07"
                        class="form-label col-md-4">Kewarganegaraan</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlInput7 validationCustom07"
                            aria-label="Kewarganegaraan" required>
                            <option selected disabled value="">Pilih Kewarganegaraan</option>
                            <option value="1">WNI</option>
                            <option value="2">WNA</option>
                            <option value="2">Keturunan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput8 validationCustom08" class="form-label col-md-4">Anak Ke</label>
                    <div class="col-md-8 ">
                        <input class="form-control" id="exampleFormControlInput8 validationCustom08"
                            placeholder="Anak Ke" type="number" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput9 validationCustom09" class="form-label col-md-4">Jumlah
                        Saudara
                        Kandung</label>
                    <div class="col-md-8">
                        <input class="form-control" type="number" id="exampleFormControlInput2 validationCustom09"
                            placeholder="Jumlah Saudara Kandung" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput10 validationCustom10" class="form-label col-md-4">Jumlah
                        Saudara Tiri</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput10 validationCustom10"
                            placeholder="Jumlah Saudara Tiri" type="number" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput11 valdiationCustom11" class="form-label col-md-4">Jumlah
                        Saudara
                        Angkat</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput11 valdiationCustom11"
                            placeholder="Jumlah Saudara Angkat" type="number" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput12 customValidation12" class="form-label col-md-4">Bahasa
                        Sehari-hari</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput12 customValidation12"
                            placeholder="Bahasa Sehari-hari" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput13 customValidation13" class="form-label col-md-4">Berat
                        Badan</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput13 customValidation13"
                            placeholder="Berat Badan" type="number" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput14 customValidation14" class="form-label col-md-4">Tinggi
                        Badan</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput14 customValidation14"
                            placeholder="Tinggi Badan" type="number" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlSelect15 customValidation15" class="form-label col-md-4">Golongan
                        Darah</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlSelect15 customValidation15"
                            aria-label="Golongan Darah" required>
                            <option selected disabled value="">Pilih Golongan Darah</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">AB</option>
                            <option value="4">O</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput16 customValidation16"
                        class="form-label col-md-4">Alamat</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="exampleFormControlInput16 customValidation16"
                            placeholder="Alamat" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput17 customValidation17" class="form-label col-md-4">Nomor
                        Telepon</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput17 cutomValidation17" type="number"
                            placeholder="Nomor Telepon" required>
                        <div id="exampleFormControlInput17 cutomValidation17" class="form-text"
                            style="font-size: 0.8em;">Contoh: 085799653788
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlSelect18 customValidation18" class="form-label col-md-4">Bertempat
                        Tinggal</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlSelect18 customValidation18"
                            aria-label="Bertempat Tinggal" required>
                            <option selected disabled value="">Bertempat Tinggal pada</option>
                            <option value="1">Orang Tua</option>
                            <option value="2">Menumpang</option>
                            <option value="3">Asrama</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlSelect19 customValidation19" class="form-label col-md-4">Masuk
                        Sekolah
                        Sebagai</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlSelect19 customValidation19"
                            aria-label="Masuk Sekolah sebagai" required>
                            <option selected disabled value="">Masuk Sekolah Sebagai</option>
                            <option value="1">Siswa Baru</option>
                            <option value="2">Pindahan</option>
                        </select>
                    </div>
                </div>
                <div class="row batas-5">
                    <label for="exampleFormControlSelect20 customValidation20" class="form-label col-md-4">Asal
                        Anak</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlSelect20 customValidation20"
                            aria-label="Asal Anak" required>
                            <option selected disabled value="">Pilih Asal Anak</option>
                            <option value="1">Rumah Tangga</option>
                            <option value="2">TK</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4 tk-info">
                    <label for="exampleFormControlInput21 customValidation21" class="form-label col-md-4">Nama Taman
                        <br>
                        Kanak-kanak</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput21 customValidation21"
                            placeholder="Nama TK" required type="text">
                    </div>
                </div>
                <div class="row mb-4 tk-info">
                    <label for="exampleFormControlInput22 customValidation22" class="form-label col-md-4">Nomor/Tahun
                        <br> Surat
                        Keterangan</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput22 customValidation22"
                            placeholder="Nomor/Tahun Surat Keterangan" type="text" required>
                        <div id="exampleFormControlInput22 customValidation22" class="form-text"
                            style="font-size: 0.8em;">Contoh: 422/.../TK/2017
                        </div>
                    </div>
                </div>
                <div class="row mb-4 tk-info">
                    <label for="exampleFormControlInput23 customValidation23" class="form-label col-md-4">Lama
                        Belajar</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput23 customValidation23"
                            placeholder="Lama Belajar" type="number" required>
                    </div>
                </div>

            </div>
            <div id="item-2">
                <h2 class="mb-4 responsive-text-head-1" style="font-weight: bold; color:#3c6255;">Identitas Orang
                    Tua/Wali
                </h2>
            </div>
            <div id="item-2-1">
                <h3 class="mb-4 responsive-text-head-1" style="font-weight: 600; color:#3c6255;"> Identitas Ayah</h3>
                <div class="row mb-4">
                    <label for="exampleFormControlInput24 customValidation24" class="form-label col-md-4">Nama
                        Lengkap</label>
                    <div class="col-md-8">
                        <input class="form-control" id="exampleFormControlInput24 customValidation24"
                            placeholder="Nama Lengkap" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput25 customValidation25" class="form-label col-md-4">Tempat
                        Lahir</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput25 customValidation25"
                            placeholder="Tempat Lahir" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput26 customValidation26" class="form-label col-md-4">Tanggal
                        lahir</label>
                    <div class="col-md-8">
                        <div class="input-group date">
                            <input type="text" class="form-control "
                                id="exampleFormControlInput26 customValidation26" placeholder="Tanggal Lahir"
                                type="date" required>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="bi bi-calendar-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput27 customValidation27"
                        class="form-label col-md-4">Agama</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput27 customValidation27"
                            placeholder="Agama" type="text" required>
                        <div id="" class="form-text" style="font-size: 0.8em;">Contoh: Islam</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput28 customValidation28"
                        class="form-label col-md-4">Kewarganegaraan</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlInput28 customValidation28"
                            aria-label="Kewarganegaraan" required>
                            <option selected disabled value="">Pilih Kewarganegaraan</option>
                            <option value="1">WNI</option>
                            <option value="2">WNA</option>
                            <option value="3">Keturunan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput29 customValidation29" class="form-label col-md-4">Pendidikan
                        Terakhir</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput29 customValidation29"
                            placeholder="Pendidikan Terakhir" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput30 customValidation30"
                        class="form-label col-md-4">Pekerjaan</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput30 customValidation30"
                            placeholder="Pekerjaan" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput31 customValidation31" class="form-label col-md-4">Gaji
                        Perbulan</label>
                    <div class="col-md-8">
                        <select class="form-select  " id="exampleFormControlInput31 customValidation31"
                            aria-label="Gaji Perbulan" required>
                            <option selected disabled value="">Pilih Gaji Perbulan</option>
                            <option value="1">Kurang dari Rp 500.000.00</option>
                            <option value="2">Rp 500.000.00 - Rp 999.000.00</option>
                            <option value="3">Rp 1.000.000.00 - Rp 1.999.000.00</option>
                            <option value="4">Rp 2.000.000.00 - Rp 4.000.000.00</option>
                            <option value="5">Lebih dari Rp 4.000.000.00</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput32 customValidation32" class="form-label col-md-4">Alamat
                        Rumah</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput32 customValidation32"
                            placeholder="Alamat Rumah" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput33 customValidation33" class="form-label col-md-4">Alamat
                        Kantor</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput33 customValidation33"
                            placeholder="Alamat Kantor" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput34 customValidation34" class="form-label col-md-4">Nomor
                        Telepon/HP</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput34 customValidation34"
                            placeholder="Nomor Telepon/HP" type="number" required>
                        <div id="" class="form-text" style="font-size: 0.8em;">Contoh: 085799653788
                        </div>
                    </div>
                </div>
            </div>
            <div id="item-2-2">
                <h3 class="mb-4 responsive-text-head" style="font-weight: 600; color:#3c6255;">Identitas Ibu</h3>
                <div class="row mb-4">
                    <label for="exampleFormControlInput35 customValidation35" class="form-label col-md-4">Nama
                        Lengkap</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput35 customValidation35"
                            placeholder="Nama Lengkap" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput36 customValidation36" class="form-label col-md-4">Tempat
                        Lahir</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput36 customValidation36"
                            placeholder="Tempat Lahir" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput37 customValidation37" class="form-label col-md-4">Tanggal
                        lahir</label>
                    <div class="col-md-8">
                        <div class="input-group date">
                            <input type="text" class="form-control "
                                id="exampleFormControlInput37 customValidation37" placeholder="Tanggal Lahir"
                                type="number" required>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="bi bi-calendar-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput38 customValidation38"
                        class="form-label col-md-4">Agama</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput38 customValidation38"
                            placeholder="Agama" type="text" required>
                        <div id="" class="form-text" style="font-size: 0.8em;">Contoh: Islam</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput39 customValidation39"
                        class="form-label col-md-4">Kewarganegaraan</label>
                    <div class="col-md-8">
                        <select class="form-select" id="exampleFormControlInput39 customValidation39"
                            aria-label="Kewarganegaraan" required>
                            <option selected disabled value="">Pilih Kewarganegaraan</option>
                            <option value="1">WNI</option>
                            <option value="2">WNA</option>
                            <option value="3">Keturunan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput40 customValidation40" class="form-label col-md-4">Pendidikan
                        Terakhir</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput40 customValidation40"
                            placeholder="Pendidikan Terakhir" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput41 customValidation41"
                        class="form-label col-md-4">Pekerjaan</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput41 customValidation41"
                            placeholder="Pekerjaan" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput42 customValidation42" class="form-label col-md-4">Gaji
                        Perbulan</label>
                    <div class="col-md-8">
                        <select class="form-select  " id="exampleFormControlInput42 customValidation42"
                            aria-label="Gaji Perbulan" required>
                            <option selected disabled value="">Pilih Gaji Perbulan</option>
                            <option value="1">Kurang dari Rp 500.000.00</option>
                            <option value="2">Rp 500.000.00 - Rp 999.000.00</option>
                            <option value="3">Rp 1.000.000.00 - Rp 1.999.000.00</option>
                            <option value="4">Rp 2.000.000.00 - Rp 4.000.000.00</option>
                            <option value="5">Lebih dari Rp 4.000.000.00</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput43 customValidation43" class="form-label col-md-4">Alamat
                        Rumah</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput43 customValidation43"
                            placeholder="Alamat Rumah" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput44 customValidation44" class="form-label col-md-4">Alamat
                        Kantor</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput44 customValidation44"
                            placeholder="Alamat Kantor" type="text" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="exampleFormControlInput45 customValidation45" class="form-label col-md-4">Nomor
                        Telepon/HP</label>
                    <div class="col-md-8">
                        <input class="form-control " id="exampleFormControlInput45 customValidation45"
                            placeholder="Nomor Telepon/HP" type="number" required>
                        <div id="" class="form-text" style="font-size: 0.8em;">Contoh: 085799653788
                        </div>
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
                <p class="mb-2">
                    Isi nomor Telepon atau HP yang dapat dihubungi untuk
                    mendapatkan bukti pendaftaran dan konfirmasi lebih lanjut dari kami <span
                        style="color:red;">*</span>
                </p>
                <div class="col-md-8 mb-4">
                    <input class="form-control " id="exampleFormControlInput1" placeholder="" type="number"
                        required>
                    <div id="" class="form-text" style="font-size: 0.8em;">Contoh: 085799653788</div>
                </div>
                <button type="submit" class="btn w-100 mb-5 submit-style"
                    style="background-color: #3c6255; color: white;">Kirim Pendaftaran</button>
            </div>
        </form>
    </div>
</div>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
