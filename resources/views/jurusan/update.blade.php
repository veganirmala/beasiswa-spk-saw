@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <h3>Edit Data Jurusan</h3>
        <form action="/jurusan/{{ $jurusan->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="namajurusan">Nama Jurusan<span style="color:red;">*</span></label>
                <input type="text" name="namajurusan" class="form-control @error ('namajurusan') is-invalid @enderror" id="namajurusan" placeholder="Nama Lengkap" required value="{{ old('namajurusan', $jurusan->namajurusan) }}">   
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