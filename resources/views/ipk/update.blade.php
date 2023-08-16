@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit IPK Data</h3>
            <form action="/ipk/{{ $ipk->nim }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nim">NIM<span style="color:red;">*</span></label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                        id="nim" placeholder="NIM" required value="{{ old('nim', $ipk->nim) }}" disabled>
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                @error('nim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="nilai_ipk">IPK Value<span style="color:red;">*</span></label>
                    <input type="text" name="nilai_ipk" class="form-control @error('nilai_ipk') is-invalid @enderror"
                        id="nilai_ipk" placeholder="IPK Value" required value="{{ old('nilai_ipk', $ipk->nilai_ipk) }}">
                    @error('nilai_ipk')
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
