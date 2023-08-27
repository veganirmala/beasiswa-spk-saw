@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Add Student File Data</h3>
            <form action="/berkasmahasiswa/create" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::get('user_level') == 'Admin')
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
                @else
                    <div class="form-group">
                        <label for="nim">NIM<span style="color:red;">*</span></label>
                        <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                            id="nim" placeholder="NIM Mahasiswa" required autofocus
                            value="{{ Session::get('user_nim') }}" readonly>
                    </div>
                @endif
                <div class="form-group">
                    <label for="dokumenkhs">KHS Document<span style="color:red;">*</span></label>
                    <input name="dokumenkhs" id="dokumenkhs"
                        class="form-control @error('dokumenkhs') is-invalid @enderror" type="file" id="formFile">
                    @error('dokumenkhs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumenpenghasilan">Parents Income Documents<span style="color:red;">*</span></label>
                    <input name="dokumenpenghasilan" id="dokumenpenghasilan"
                        class="form-control @error('dokumenpenghasilan') is-invalid @enderror" type="file"
                        id="formFile">
                    @error('dokumenpenghasilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dokumennilaiprestasi">Achievement Score Document<span
                            style="color:red;">*</span></label>
                    <input name="dokumennilaiprestasi" id="dokumennilaiprestasi"
                        class="form-control @error('dokumennilaiprestasi') is-invalid @enderror" type="file"
                        id="formFileMultiple">
                    @error('dokumennilaiprestasi')
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
