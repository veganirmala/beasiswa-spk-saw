@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <h3>Tambah Data User</h3>
        <form action="/user/create" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_user">Nama Lengkap<span style="color:red;">*</span></label>
                <input type="text" name="nama_user" class="form-control @error ('nama_user') is-invalid @enderror" id="nama_user" placeholder="Nama Lengkap" required autofocus value="{{ old('nama_user') }}">   
                @error ('nama_user') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class=" form-group">
                <label for="email_user">E-mail<span style="color:red;">*</span></label>
                <input type="text" name="email_user" class="form-control @error ('email_user') is-invalid @enderror" id="email_user" placeholder="***@gmail.com" required value="{{ old('email_user') }}">
                @error ('email_user') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jk_user">Jenis Kelamin</label>
                <br>
                <input type="radio" id="perempuan" name="jk_user">
                <label>Perempuan</label>
                <tr><input type="radio" id="laki-laki" name="jk_user">
                    <label>Laki-laki</label>
                </tr>
            </div>
            <div class="form-group">
                <label for="telp_user">Telepon<span style="color:red;">*</span></label>
                <input type="text" name="telp_user" class="form-control @error ('telp_user') is-invalid @enderror" id="telp_user" placeholder="Telepon" required value="{{ old('telp_user') }}">  
                @error ('telp_user') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_user">Alamat<span style="color:red;">*</span></label>
                <input type="text" name="alamat_user" class="form-control @error ('alamat_user') is-invalid @enderror" id="alamat_user" placeholder="Alamat" required value="{{ old('alamat_user') }}">
                @error ('alamat_user') 
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