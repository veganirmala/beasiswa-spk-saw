@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <h3>Edit Data Tahun Usulan</h3>
        <form action="/tahunusulan/{{ $tahunusulan->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="idjenisbeasiswa">Jenis Beasiswa<span style="color:red;">*</span></label>
                <select class="form-control @error ('idjenisbeasiswa') is-invalid @enderror" tabindex="-1" aria-hidden="true" name="idjenisbeasiswa" id="idjenisbeasiswa" value="{{ old('idjenisbeasiswa')}}">
                    <option value="{{ $tahunusulan->idjenisbeasiswa }}">{{ $tahunusulan->jenisbeasiswa }}</option>
                    @foreach ($jenis as $jenisbeasiswaa)
                    <option value="{{ $jenisbeasiswaa->id }}">{{ $jenisbeasiswaa->jenisbeasiswa }}</option>
                    @endforeach
                </select>
                @error ('idjenisbeasiswa') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun">Tahun<span style="color:red;">*</span></label>
                <input type="text" name="tahun" class="form-control @error ('tahun') is-invalid @enderror" id="tahun" placeholder="Tahun" required value="{{ old('tahun', $tahunusulan->tahun) }}">   
                @error ('tahun') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kuota">Kuota<span style="color:red;">*</span></label>
                <input type="text" name="kuota" class="form-control @error ('kuota') is-invalid @enderror" id="kuota" placeholder="Kuota" required value="{{ old('kuota', $tahunusulan->kuota) }}">   
                @error ('kuota') 
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