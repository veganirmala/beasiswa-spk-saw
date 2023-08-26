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
                    <h1 class="m-0">Data Berkas Mahasiswa</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (session()->has('success'))
        <div class="alert alert-success col-12" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        @role('mahasiswa')
                        <?php if (empty($databerkasmahasiswa)) : ?>
                        <a href="/berkasmahasiswa/create" class="btn btn-primary" title="Tambah Data"><i
                                class="fas fa-plus"></i> Tambah</a>
                        <p></p>
                        <?php endif; ?>
                        @else
                        <a href="/berkasmahasiswa/create" class="btn btn-primary" title="Tambah Data"><i
                                class="fas fa-plus"></i> Tambah</a>
                        <p></p>
                        @endif
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIM</th>
                                        <th>DOKUMEN KHS</th>
                                        <th>DOKUMEN PENGHASILAN ORANG TUA</th>
                                        <th>DOKUMEN NILAI PRESTASI</th>
                                        <th>STATUS</th>
                                        <th>KETERANGAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($berkasmahasiswa)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Berkas Mahasiswa tidak berhasil ditemukan
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
                                            <a href="/berkasmahasiswa/{{ $berkas->nim }}/edit">Edit</a>
                                        @else
                                            <a href="/berkasmahasiswa/{{ $berkas->nim }}/show">View</a>
                                            <a href="/berkasmahasiswa/{{ $berkas->nim }}/ubah">edit</a>
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
