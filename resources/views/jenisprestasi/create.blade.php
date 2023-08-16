@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Add Achievement Type Data</h3>
            <form action="/jenisprestasi/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="peringkat">Rating<span style="color:red;">*</span></label>
                    <select class="form-control @error('peringkat') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="peringkat" id="peringkat" value="{{ old('peringkat') }}">
                        <option value="Juara 1">Juara 1</option>
                        <option value="Juara 2">Juara 2</option>
                        <option value="Juara 3">Juara 3</option>
                        <option value="Harapan 1">Harapan 1</option>
                        <option value="Harapan 2">Harapan 2</option>
                        <option value="Harapan 3">Harapan 3</option>
                    </select>
                    @error('peringkat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenisprestasi">Achievement Type<span style="color:red;">*</span></label>
                    <select class="form-control @error('jenisprestasi') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="jenisprestasi" id="jenisprestasi" value="{{ old('jenisprestasi') }}">
                        <option value="Akademik">Akademik</option>
                        <option value="Non Akademik">Non Akademik</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('jenisprestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tingkat">Level<span style="color:red;">*</span></label>
                    <select class="form-control @error('tingkat') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="tingkat" id="tingkat" value="{{ old('tingkat') }}">
                        <option value="Intern Kampus">Intern Kampus</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Nasional">Nasional</option>
                    </select>
                    @error('tingkat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai">Value<span style="color:red;">*</span></label>
                    <input type="text" name="nilai" class="form-control @error('nilai') is-invalid @enderror"
                        id="nilai" placeholder="Value" required value="{{ old('nilai') }}">
                    @error('nilai')
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
