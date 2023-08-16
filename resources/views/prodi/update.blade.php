@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Study Program Data</h3>
            <form action="/prodi/{{ $prodi->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="namaprodi">Study Program Name<span style="color:red;">*</span></label>
                    <input type="text" name="namaprodi" class="form-control @error('namaprodi') is-invalid @enderror"
                        id="namaprodi" placeholder="Study Program Name" required
                        value="{{ old('namaprodi', $prodi->namaprodi) }}">
                    @error('namaprodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namajurusan">Level<span style="color:red;">*</span></label>
                    <select class="form-control @error('jenjang') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="jenjang" id="jenjang" value="{{ old('jenjang') }}">
                        <option value="<?= $prodi['jenjang'] ?>"><?= $prodi['jenjang'] ?></option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                    </select>
                    @error('jenjang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idjurusan">Department Name<span style="color:red;">*</span></label>
                    <select class="form-control @error('idjurusan') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="idjurusan" id="idjurusan" value="{{ old('idjurusan') }}">
                        <option value="{{ $prodi->id }}">{{ $prodi->namajurusan }}</option>
                        @foreach ($jur as $jurusann)
                            <option value="{{ $jurusann->id }}">{{ $jurusann->namajurusan }}</option>
                        @endforeach
                    </select>
                    @error('idjurusan')
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
