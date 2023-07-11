@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Tambah Data Berkas Mahasiswa</h3>
            <form action="/berkasmahasiswa/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM<span style="color:red;">*</span></label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                        id="nim" placeholder="NIM Mahasiswa" required autofocus value="{{ old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumenkhs">Dokumen KHS<span style="color:red;">*</span></label>
                    <input class="form-control" name="dokumenkhs" id="dokumenkhs"
                        class="form-control @error('dokumenkhs') is-invalid @enderror" type="file" id="formFile">
                    @error('dokumenkhs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumenpenghasilan">Dokumen Penghasilan Orang Tua<span
                            style="color:red;">*</span></label>
                    <input class="form-control" name="dokumenpenghasilan" id="dokumenpenghasilan"
                        class="form-control @error('dokumenpenghasilan') is-invalid @enderror" type="file"
                        id="formFile">
                    @error('dokumenpenghasilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumennilaiprestasi">Dokumen Nilai Prestasi<span style="color:red;">*</span></label>
                    <input class="form-control" name="dokumennilaiprestasi" id="dokumennilaiprestasi"
                        class="form-control @error('dokumennilaiprestasi') is-invalid @enderror" type="file"
                        id="formFileMultiple">
                    @error('dokumennilaiprestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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

@include('template.footer')
