@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student File Data</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    @if (session()->has('success'))
        <div class="alert alert-success col-12" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger col-12" role="alert">
            {{ session('danger') }}
        </div>
    @endif


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (auth()->User()->level == 'Admin')
                            <div class="row">
                                <div class="d-flex justify-content-end">
                                    <form action="/berkasmahasiswa" method="GET">
                                        <div class="input-group mb-3">
                                            <div class="col-auto">
                                                <input type="search" class="form-control" placeholder="Search"
                                                    name="search" id="search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                        @if (auth()->User()->level == 'Mahasiswa')
                            <?php if (empty($databerkasmahasiswa)) : ?>
                            <a href="/berkasmahasiswa/create" class="btn btn-primary" title="Add Data"><i
                                    class="fas fa-plus"></i> Add</a>
                            <p></p>
                            <?php endif; ?>
                        @else
                            <a href="/berkasmahasiswa/create" class="btn btn-primary" title="Add Data"><i
                                    class="fas fa-plus"></i> Add</a>
                            <p></p>
                        @endif
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NUMBER</th>
                                        <th>NIM</th>
                                        <th>KHS DOCUMENTS</th>
                                        <th>PARENTS INCOME DOCUMENTS</th>
                                        <th>ACHIEVEMENT VALUE DOCUMENT</th>
                                        <th>STATUS</th>
                                        <th>INFORMATION</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($berkasmahasiswa)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Student File Data could not be found
                                    </div>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($berkasmahasiswa as $berkas) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td>{{ $berkas->nim }}</td>
                                        <td>{{ $berkas->dokumenkhs }}</td>
                                        <td>{{ $berkas->dokumenpenghasilan }}</td>
                                        <td>{{ $berkas->dokumennilaiprestasi }}</td>
                                        <td>{{ $berkas->status }}</td>
                                        <td>{{ $berkas->keterangan }}</td>
                                        <td>
                                            @role('admin')
                                                <a href="/berkasmahasiswa/{{ $berkas->nim }}/show">View</a>
                                                @if (Session::get('user_level') == 'Admin')
                                                    <a href="/berkasmahasiswa/{{ $berkas->nim }}/edit">Verifikasi</a>
                                                    <a href="/berkasmahasiswa/{{ $berkas->nim }}/ubah">Edit</a>
                                                @endif
                                            @else
                                                <a href="/berkasmahasiswa/{{ $berkas->nim }}/show">View</a>
                                                <a href="/berkasmahasiswa/{{ $berkas->nim }}/ubah">Edit</a>
                                            @endrole
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('template.footer')
