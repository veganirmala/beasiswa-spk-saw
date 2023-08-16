@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Add User Data</h3>
            <form action="/user/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full name<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Full name" required autofocus value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="email">E-mail<span style="color:red;">*</span></label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="***@gmail.com" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="password">Password<span style="color:red;">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" required value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk">Gender</label>
                    <br>
                    <input type="radio" id="Female" value="Female" name="jk">
                    <label>Female</label>
                    <tr><input type="radio" id="Male" value="Male" name="jk">
                        <label>Male</label>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="telp">Telephone<span style="color:red;">*</span></label>
                    <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror"
                        id="telp" placeholder="Telephone" required value="{{ old('telp') }}">
                    @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Address<span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat" placeholder="Address" required value="{{ old('alamat') }}">
                    @error('alamat')
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
