@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Data Mahasiswa</h3>
            <form action="/mahasiswa/{{ $mahasiswa->nim }}" method="POST">
                @method('put')
                @csrf
                <div class="row">
                    <!-- awal kolom 1 -->
                    <div class="col-md-6">
                        <div class="col">
                            <div class="form-group">
                                <label for="nim">NIM<span style="color:red;">*</span></label>
                                <input type="text" name="nim"
                                    class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    placeholder="NIM" required value="{{ old('nim', $mahasiswa->nim) }}" disabled>
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Student Name<span style="color:red;">*</span></label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    placeholder="Student Name" required value="{{ old('nama', $mahasiswa->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jk">Gender</label>
                                <br>
                                <input type="radio" id="Female" value="Female" name="jk" <?php if ($mahasiswa['jk'] == 'Female') {
                                    echo 'checked';
                                } ?>>
                                <label>Female</label>
                                <tr><input type="radio" id="Male" value="Male" name="jk"
                                        <?php if ($mahasiswa['jk'] == 'Male') {
                                            echo 'checked';
                                        } ?>>
                                    <label>Male</label>
                                </tr>
                            </div>
                            <div class="form-group">
                                <label for="idprodi">Study Program Name<span style="color:red;">*</span></label>
                                <select class="form-control @error('idprodi') is-invalid @enderror" tabindex="-1"
                                    aria-hidden="true" name="idprodi" id="idprodi" value="{{ old('idprodi') }}">
                                    <option value="<?= $mahasiswa['idprodi'] ?>"><?= $mahasiswa['namaprodi'] ?></option>
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
                                <label for="email">E-mail-<span style="color:red;">*</span></label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="E-mail" required value="{{ old('email', $mahasiswa->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="notelp">Student Phone Number<span style="color:red;">*</span></label>
                                <input type="text" name="notelp"
                                    class="form-control @error('notelp') is-invalid @enderror" id="notelp"
                                    placeholder="Student Phone Number" required
                                    value="{{ old('notelp', $mahasiswa->notelp) }}">
                                @error('notelp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Student Address<span style="color:red;">*</span></label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    placeholder="Student Address" required
                                    value="{{ old('alamat', $mahasiswa->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namaayah">Father's Name<span style="color:red;">*</span></label>
                                <input type="text" name="namaayah"
                                    class="form-control @error('namaayah') is-invalid @enderror" id="namaayah"
                                    placeholder="Father's Name" required
                                    value="{{ old('namaayah', $mahasiswa->namaayah) }}">
                                @error('namaayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanayah">Father's Occupation<span style="color:red;">*</span></label>
                                <input type="text" name="pekerjaanayah"
                                    class="form-control @error('pekerjaanayah') is-invalid @enderror" id="pekerjaanayah"
                                    placeholder="Father's Occupation" required
                                    value="{{ old('pekerjaanayah', $mahasiswa->pekerjaanayah) }}">
                                @error('pekerjaanayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penghasilanayah">Father's Income<span style="color:red;">*</span></label>
                                <input type="text" name="penghasilanayah"
                                    class="form-control @error('penghasilanayah') is-invalid @enderror"
                                    id="penghasilanayah" onkeyup="sum();" placeholder="Father's Income" required
                                    value="{{ old('penghasilanayah', $mahasiswa->penghasilanayah) }}">
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
                                <label for="namaibu">Mother's Name<span style="color:red;">*</span></label>
                                <input type="text" name="namaibu"
                                    class="form-control @error('namaibu') is-invalid @enderror" id="namaibu"
                                    placeholder="Mother's Name" required
                                    value="{{ old('namaibu', $mahasiswa->namaibu) }}">
                                @error('namaibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanibu">Mother's Occupation<span style="color:red;">*</span></label>
                                <input type="text" name="pekerjaanibu"
                                    class="form-control @error('pekerjaanibu') is-invalid @enderror"
                                    id="pekerjaanibu" placeholder="Mother's Occupation" required
                                    value="{{ old('pekerjaanibu', $mahasiswa->pekerjaanibu) }}">
                                @error('pekerjaanibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penghasilanibu">Mother's Income<span style="color:red;">*</span></label>
                                <input type="text" name="penghasilanibu"
                                    class="form-control @error('penghasilanibu') is-invalid @enderror"
                                    id="penghasilanibu" onkeyup="sum();" placeholder="Mother's Income" required
                                    value="{{ old('penghasilanibu', $mahasiswa->penghasilanibu) }}">
                                @error('penghasilanibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggungan">Parental Responsibilities<span
                                        style="color:red;">*</span></label>
                                <input type="text" name="tanggungan"
                                    class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan"
                                    placeholder="Parental Responsibilities" required
                                    value="{{ old('tanggungan', $mahasiswa->tanggungan) }}">
                                @error('tanggungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="totalpenghasilan">Total Income of Parents<span
                                        style="color:red;">*</span></label>
                                <input type="text" name="totalpenghasilan"
                                    class="form-control @error('totalpenghasilan') is-invalid @enderror"
                                    id="totalpenghasilan" placeholder="Total Income of Parents" readonly
                                    value="{{ old('totalpenghasilan', $mahasiswa->totalpenghasilan) }}">
                                @error('totalpenghasilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="namabank">Bank Name<span style="color:red;">*</span></label>
                                <input type="text" name="namabank"
                                    class="form-control @error('namabank') is-invalid @enderror" id="namabank"
                                    placeholder="Bank Name" required
                                    value="{{ old('namabank', $mahasiswa->namabank) }}">
                                @error('namabank')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="norek">Bank Account Number<span style="color:red;">*</span></label>
                                <input type="text" name="norek"
                                    class="form-control @error('norek') is-invalid @enderror" id="norek"
                                    placeholder="Bank Account Number" required
                                    value="{{ old('norek', $mahasiswa->norek) }}">
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
                                    <option value="<?= $mahasiswa['semester'] ?>"><?= $mahasiswa['semester'] ?>
                                    </option>
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
                                <label for="idtahunusulan">Proposed Year<span style="color:red;">*</span></label>
                                <select class="form-control @error('idtahunusulan') is-invalid @enderror"
                                    tabindex="-1" aria-hidden="true" name="idtahunusulan" id="idtahunusulan"
                                    value="{{ old('idtahunusulan') }}">
                                    <option value="<?= $mahasiswa['idtahunusulan'] ?>">
                                        <?= $mahasiswa['tahun'] ?></option>
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
                    Save
                </button>
                <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                    Back
                </button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('penghasilanayah').value;
        var txtSecondNumberValue = document.getElementById('penghasilanibu').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('totalpenghasilan').value = result;
        }
    }
</script>


{{-- <script type="text/javascript">
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
</script> --}}

@include('template.footer')
