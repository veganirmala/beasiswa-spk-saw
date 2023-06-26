@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <h3>Tambah Data Prodi</h3>
        <form action="/prodi/{{ $prodi->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="namaprodi">Nama Prodi<span style="color:red;">*</span></label>
                <input type="text" name="namaprodi" class="form-control @error ('namaprodi') is-invalid @enderror" id="namaprodi" placeholder="Nama Prodi" required value="{{ old('namaprodi', $prodi->namaprodi) }}">   
                @error ('namaprodi') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="namajurusan">Jenjang<span style="color:red;">*</span></label>
                <select class="form-control @error ('jenjang') is-invalid @enderror" tabindex="-1" aria-hidden="true" name="jenjang" id="jenjang" value="{{ old('jenjang')}}">
                    <option value="<?= $prodi['jenjang']; ?>"><?= $prodi['jenjang']; ?></option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                </select>
                @error ('jenjang') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="namajurusan">Nama Jurusan<span style="color:red;">*</span></label>
                <select class="form-control @error ('namajurusan') is-invalid @enderror" tabindex="-1" aria-hidden="true" name="namajurusan" id="namajurusan" value="{{ old('namajurusan')}}">
                    <option value="<?= $prodi['namajurusan']; ?>"><?= $prodi['namajurusan']; ?></option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                </select>
                @error ('namajurusan') 
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