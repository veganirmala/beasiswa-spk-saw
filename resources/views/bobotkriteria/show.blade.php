@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data Bobot Kriteria</h3>
            <form action="/bobotkriteria/{{ $bobotkriteria->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">ID Bobot Kriteria</h4>
                                <p class="card-text"><?= $bobotkriteria['id'] ?></p>
                                <h4 class="card-title">Tahun Usulan</h4>
                                <p class="card-text"><?= $bobotkriteria['tahun'] ?></p>
                                <h4 class="card-title">Jenis Beasiswa</h4>
                                <p class="card-text"><?= $bobotkriteria['jenisbeasiswa'] ?></p>
                                <h4 class="card-title">Bobot Kriteria IPK</h4>
                                <p class="card-text"><?= $bobotkriteria['bobotkriteriaipk'] ?></p>
                                <h4 class="card-title">Bobot Kriteria Prestasi</h4>
                                <p class="card-text"><?= $bobotkriteria['bobotkriteriaprestasi'] ?></p>
                                <h4 class="card-title">Bobot Kriteria Penghasilan</h4>
                                <p class="card-text"><?= $bobotkriteria['bobotkriteriapenghasilan'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                Kembali
            </button>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
