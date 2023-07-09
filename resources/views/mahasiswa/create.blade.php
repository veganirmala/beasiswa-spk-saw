@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<script>
    function startCalc() {
        interval = setInterval(“calc()”, 1);
    }

    function calc() {
        one = document.autoSumForm.penghasilanayah.value;
        two = document.autoSumForm.penghasilanibu.value;
        document.autoSumForm.totalpenghasilan.value = one + two;
    }

    function stopCalc() {
        clearInterval(interval);
    }
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Mahasiswa</h3>
            <form action="/mahasiswa/create" method="POST">
                @csrf
                <div class="row">
                    <!-- awal kolom 1 -->
                    <div class="col-md-6">
                        <div class="col">
                            <div class="form-group">
                                <label for="nim">NIM<span style="color:red;">*</span></label>
                                <input type="text" name="nim"
                                    class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    placeholder="NIM" required autofocus value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Nama Mahasiswa" required value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <br>
                                <input type="radio" id="perempuan" value="Perempuan" name="jk">
                                <label>Perempuan</label>
                                <tr><input type="radio" id="laki-laki" value="Laki-laki" name="jk">
                                    <label>Laki-laki</label>
                                </tr>
                            </div>
                            <div class="form-group">
                                <label for="idprodi">Nama Prodi<span style="color:red;">*</span></label>
                                <select class="form-control @error('idprodi') is-invalid @enderror" tabindex="-1"
                                    aria-hidden="true" name="idprodi" id="idprodi" value="{{ old('idprodi') }}">
                                    @foreach ($prodi as $prodii)
                                        <option value="{{ $prodii->id }}">{{ $prodii->namaprodi }}</option>
                                    @endforeach
                                </select>
                                @error('idprodi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Email Mahasiswa" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="notelp">No Telepon Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="notelp"
                                    class="form-control @error('notelp') is-invalid @enderror" id="notelp"
                                    placeholder="No Telepon Mahasiswa" required value="{{ old('notelp') }}">
                                @error('notelp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Mahasiswa<span style="color:red;">*</span></label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    placeholder="Alamat Mahasiswa" required value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namaayah">Nama Ayah<span style="color:red;">*</span></label>
                                <input type="text" name="namaayah"
                                    class="form-control @error('namaayah') is-invalid @enderror" id="namaayah"
                                    placeholder="Nama Ayah" required value="{{ old('namaayah') }}">
                                @error('namaayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanayah">Pekerjaan Ayah<span style="color:red;">*</span></label>
                                <input type="text" name="pekerjaanayah"
                                    class="form-control @error('pekerjaanayah') is-invalid @enderror" id="pekerjaanayah"
                                    placeholder="Pekerjaan Ayah" required
                                    value="{{ old('pekerjaanayah') }}"onFocus=”startCalc();” onBlur=”stopCalc();”>
                                @error('pekerjaanayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penghasilanayah">Penghasilan Ayah<span style="color:red;">*</span></label>
                                <input type="text" name="penghasilanayah"
                                    class="form-control @error('penghasilanayah') is-invalid @enderror"
                                    id="penghasilanayah" placeholder="Penghasilan Ayah" required
                                    value="{{ old('penghasilanayah') }}">
                                @error('penghasilanayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- akhir kolom 1 -->
                    <!-- awal kolom 2 -->
                    <div class="col-md-6">
                        <div class="col">
                            <div class="form-group">
                                <label for="namaibu">Nama Ibu<span style="color:red;">*</span></label>
                                <input type="text" name="namaibu"
                                    class="form-control @error('namaibu') is-invalid @enderror" id="namaibu"
                                    placeholder="Nama Ibu" required value="{{ old('namaibu') }}">
                                @error('namaibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanibu">Pekerjaan Ibu<span style="color:red;">*</span></label>
                                <input type="text" name="pekerjaanibu"
                                    class="form-control @error('pekerjaanibu') is-invalid @enderror"
                                    id="pekerjaanibu" placeholder="Pekerjaan Ibu" required
                                    value="{{ old('pekerjaanibu') }}">
                                @error('pekerjaanibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penghasilanibu">Penghasilan Ibu<span style="color:red;">*</span></label>
                                <input type="text" name="penghasilanibu"
                                    class="form-control @error('penghasilanibu') is-invalid @enderror"
                                    id="penghasilanibu" placeholder="Penghasilan Ibu" required
                                    value="{{ old('penghasilanibu') }}">
                                @error('penghasilanibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggungan">Tanggungan Orang Tua<span style="color:red;">*</span></label>
                                <input type="text" name="tanggungan"
                                    class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan"
                                    placeholder="Tanggungan Orang Tua" required value="{{ old('tanggungan') }}">
                                @error('tanggungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="totalpenghasilan">Total Penghasilan Orang Tua<span
                                        style="color:red;">*</span></label>
                                <input type="text" name="totalpenghasilan"
                                    class="form-control @error('totalpenghasilan') is-invalid @enderror"
                                    id="totalpenghasilan" placeholder="Total Penghasilan Orang Tua" required
                                    value="{{ old('totalpenghasilan') }}">
                                @error('totalpenghasilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namabank">Nama BANK<span style="color:red;">*</span></label>
                                <input type="text" name="namabank"
                                    class="form-control @error('namabank') is-invalid @enderror" id="namabank"
                                    placeholder="Nama BANK" required value="{{ old('namabank') }}">
                                @error('namabank')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="norek">No Rekening BANK<span style="color:red;">*</span></label>
                                <input type="text" name="norek"
                                    class="form-control @error('norek') is-invalid @enderror" id="norek"
                                    placeholder="No Rekening BANK" required value="{{ old('norek') }}">
                                @error('norek')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester<span style="color:red;">*</span></label>
                                <select class="form-control @error('semester') is-invalid @enderror" tabindex="-1"
                                    aria-hidden="true" name="semester" id="semester"
                                    value="{{ old('semester') }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="idtahunusulan">Tahun Usulan<span style="color:red;">*</span></label>
                                <select class="form-control @error('idtahunusulan') is-invalid @enderror"
                                    tabindex="-1" aria-hidden="true" name="idtahunusulan" id="idtahunusulan"
                                    value="{{ old('idtahunusulan') }}">
                                    @foreach ($thusulan as $tahunusulan)
                                        <option value="{{ $tahunusulan->id }}">{{ $tahunusulan->tahun }}</option>
                                    @endforeach
                                </select>
                                @error('idtahunusulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- akhir kolom 2 -->
                </div>


                <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                    Simpan
                </button>
                <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                    Kembali
                </button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>


<script type="text/javascript">
    var rupiah = document.getElementById('totalpenghasilan');
    totalpenghasilan.addEventListener('keyup', function(e) {
        //tambahkan 'Rp.' pada saat form di ketik
        //gunakan fungsi formatRupiah() untuk mengubah angka yang diketik menjadi format angka
        totalpenghasilan.value = formatRupiah(this.value, 'Rp.');
    });

    /* fungsi formatRupiah() */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        //tambahkan titik jika yang diinput sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script type="text/javascript">
    var rupiah = document.getElementById('penghasilanayah');
    penghasilanayah.addEventListener('keyup', function(e) {
        //tambahkan 'Rp.' pada saat form di ketik
        //gunakan fungsi formatRupiah() untuk mengubah angka yang diketik menjadi format angka
        penghasilanayah.value = formatRupiah(this.value, 'Rp.');
    });

    /* fungsi formatRupiah() */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        //tambahkan titik jika yang diinput sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script type="text/javascript">
    var rupiah = document.getElementById('penghasilanibu');
    penghasilanibu.addEventListener('keyup', function(e) {
        //tambahkan 'Rp.' pada saat form di ketik
        //gunakan fungsi formatRupiah() untuk mengubah angka yang diketik menjadi format angka
        penghasilanibu.value = formatRupiah(this.value, 'Rp.');
    });

    /* fungsi formatRupiah() */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        //tambahkan titik jika yang diinput sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@include('template.footer')
