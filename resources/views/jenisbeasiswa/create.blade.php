@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <h3>Tambah Data Jenis Beasiswa</h3>
        <form action="/jenisbeasiswa/create" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenisbeasiswa">Jenis Beasiswa<span style="color:red;">*</span></label>
                <input type="text" name="jenisbeasiswa" class="form-control @error ('jenisbeasiswa') is-invalid @enderror" id="jenisbeasiswa" placeholder="Jenis Beasiswa" required autofocus value="{{ old('jenisbeasiswa') }}">   
                @error ('jenisbeasiswa') 
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