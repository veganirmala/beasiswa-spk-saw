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
                    <h1 class="m-0">Achievement Value Data</h1>
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
                        <a href="/nilaiprestasi/create" class="btn btn-primary" title="Add"><i
                                class="fas fa-plus"></i> Add</a>
                        <p></p>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NUMBER</th>
                                        <th>NIM</th>
                                        <th>TOTAL ACHIEVEMENT VALUEI</th>
                                        <th>PROPOSED YEAR</th>
                                        <th>TYPES OF SCHOLARSHIPS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($nilaiprestasi)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Achievement Score Data could not be found
                                    </div>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($nilaiprestasi as $nilai) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td>{{ $nilai->nim }}</td>
                                        <td>{{ $nilai->total }}</td>
                                        <td>{{ $nilai->tahun }}</td>
                                        <td>{{ $nilai->jenisbeasiswa }}</td>
                                        <td>
                                            <a href="/nilaiprestasi/{{ $nilai->nim }}/show" class="btn btn-success"
                                                title="Data Details"><i class="fas fa-info-circle"></i></a>
                                            <a href="/nilaiprestasi/{{ $nilai->nim }}/edit" class="btn btn-danger"
                                                title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="/nilaiprestasi/{{ $nilai->nim }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning" title="Delete Data"
                                                    onclick="return confirm('Are you going to delete this data?');"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
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
