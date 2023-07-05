@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <h3>Tambah Data IPK</h3>
        <form action="/ipk/{{ $ipk->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="nim">NIM<span style="color:red;">*</span></label>
                <select class="form-control @error ('nim') is-invalid @enderror" tabindex="-1" aria-hidden="true" name="nim" id="nim" value="{{ old('nim')}}">
                    <option value="<?= $ipk['nim']; ?>"><?= $ipk['nim']; ?></option>
                    @foreach ($mhs as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nim }}</option>
                    @endforeach
                </select>
                @error ('nim') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            <div class="form-group">
                <label for="nilai_ipk">Nilai IPK<span style="color:red;">*</span></label>
                <input type="text" name="nilai_ipk" class="form-control @error ('nilai_ipk') is-invalid @enderror" id="nilai_ipk" placeholder="Nilai IPK" required value="{{ old('nilai_ipk', $ipk->nilai_ipk) }}">   
                @error ('nilai_ipk') 
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