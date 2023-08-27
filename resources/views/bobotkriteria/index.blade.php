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
                    <h1 class="m-0">Criteria Weight Data</h1>
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
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <form action="/bobotkriteria" method="GET">
                                    <div class="input-group mb-3">
                                        <div class="col-auto">
                                            <input type="search" class="form-control" placeholder="Search"
                                                name="search" id="search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="/bobotkriteria/create" class="btn btn-primary" title="Add"><i
                                class="fas fa-plus"></i> Add</a>
                        <p></p>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NUMBER</th>
                                        <th>PROPOSED YEAR</th>
                                        <th>TYPES OF SCHOLARSHIPS</th>
                                        <th>IPK WEIGHT</th>
                                        <th>ACHIEVEMENT WEIGHT</th>
                                        <th>INCOME WEIGHT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($bobotkriteria)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Weight Criteria was not found
                                    </div>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($bobotkriteria as $bobotkriteriaa) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td>{{ $bobotkriteriaa->tahun }}</td>
                                        <td>{{ $bobotkriteriaa->jenisbeasiswa }}</td>
                                        <td>{{ $bobotkriteriaa->bobotkriteriaipk }}</td>
                                        <td>{{ $bobotkriteriaa->bobotkriteriaprestasi }}</td>
                                        <td>{{ $bobotkriteriaa->bobotkriteriapenghasilan }}</td>
                                        <td>
                                            <a href="/bobotkriteria/{{ $bobotkriteriaa->id }}/show"
                                                class="btn btn-success" title="Data Details"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <a href="/bobotkriteria/{{ $bobotkriteriaa->id }}/edit"
                                                class="btn btn-danger" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <form action="/bobotkriteria/{{ $bobotkriteriaa->id }}" method="POST">
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
