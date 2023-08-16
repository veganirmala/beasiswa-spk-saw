@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Add Proposed Year Data</h3>
            <form action="/tahunusulan/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idjenisbeasiswa">Types of Scholarships<span style="color:red;">*</span></label>
                    <select class="form-control @error('idjenisbeasiswa') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="idjenisbeasiswa" id="idjenisbeasiswa"
                        value="{{ old('idjenisbeasiswa') }}">
                        @foreach ($jenis as $jenisbeasiswaa)
                            <option value="{{ $jenisbeasiswaa->id }}">{{ $jenisbeasiswaa->jenisbeasiswa }}</option>
                        @endforeach
                    </select>
                    @error('idjenisbeasiswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun">Year<span style="color:red;">*</span></label>
                    <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
                        id="tahun" placeholder="Year" required value="{{ old('tahun') }}">
                    @error('tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuota">Quota<span style="color:red;">*</span></label>
                    <input type="text" name="kuota" class="form-control @error('kuota') is-invalid @enderror"
                        id="kuota" placeholder="Quota" required value="{{ old('kuota') }}">
                    @error('kuota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status<span style="color:red;">*</span></label>
                    <select class="form-control @error('status') is-invalid @enderror" tabindex="-1" aria-hidden="true"
                        name="status" id="status" value="{{ old('status') }}">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    @error('status')
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
