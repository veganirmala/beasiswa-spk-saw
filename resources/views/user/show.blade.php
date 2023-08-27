@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>User Data Details</h3>
            <form action="/user/{{ $user->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">User ID</h4>
                                <p class="card-text">{{ $user->id }}</p>
                                <h4 class="card-title">Username</h4>
                                <p class="card-text">{{ $user->name }}</p>
                                <h4 class="card-title">E-mail</h4>
                                <p class="card-text">{{ $user->email }}</p>
                                <h4 class="card-title"></h4>Gender</h4>
                                <p class="card-text">{{ $user->jk }}</p>
                                <h4 class="card-title">Telephone</h4>
                                <p class="card-text">{{ $user->notelp }}</p>
                                <h4 class="card-title">Address</h4>
                                <p class="card-text">{{ $user->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                Back
            </button>
        </div>

    </section>
    <!-- /.content -->
</div>

@include('template.footer')
