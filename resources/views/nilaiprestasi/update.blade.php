@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Achievement Value Data</h3>
            <form action="/nilaiprestasi/{{ $nilaiprestasi->nim }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nim">NIM<span style="color:red;">*</span></label>
                    <select class="form-control @error('nim') is-invalid @enderror" tabindex="-1" aria-hidden="true"
                        name="nim" id="nim" value="{{ old('nim') }}"readonly>
                        <option value="<?= $nilaiprestasi['nim'] ?>"><?= $nilaiprestasi['nim'] ?></option>
                        @foreach ($mhs as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nim }}</option>
                        @endforeach
                    </select>
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total">Total<span style="color:red;">*</span></label>
                    <input type="text" name="total" class="form-control @error('total') is-invalid @enderror"
                        id="total" placeholder="Total" required value="{{ old('total', $nilaiprestasi->total) }}">
                    @error('total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_usulan">Proposed Year<span style="color:red;">*</span></label>
                    <select class="form-control @error('id_usulan') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="id_usulan" id="id_usulan" value="{{ old('id_usulan') }}">
                        <option value="<?= $nilaiprestasi['id_usulan'] ?>"><?= $nilaiprestasi['tahun'] ?></option>
                        @foreach ($tahunusulan as $tahun)
                            <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                        @endforeach
                    </select>
                    @error('id_usulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_jenis_beasiswa">Types of Scholarships<span style="color:red;">*</span></label>
                    <select class="form-control @error('id_jenis_beasiswa') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="id_jenis_beasiswa" id="id_jenis_beasiswa"
                        value="{{ old('id_jenis_beasiswa') }}">
                        <option value="<?= $nilaiprestasi['id_jenis_beasiswa'] ?>">
                            <?= $nilaiprestasi['jenisbeasiswa'] ?></option>
                        @foreach ($jenisbeasiswa as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->jenisbeasiswa }}</option>
                        @endforeach
                    </select>
                    @error('id_jenis_beasiswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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

@include('template.footer')
