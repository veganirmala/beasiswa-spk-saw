@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data Nilai Prestasi</h3>
            <form action="/nilaiprestasi/{{ $nilaiprestasi->nim }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">NIM</h4>
                                <p class="card-text"><?= $nilaiprestasi['nim'] ?></p>
                                <h4 class="card-title">Jenis Prestasi</h4>
                                <p class="card-text"><?= $nilaiprestasi['jenisprestasi'] ?></p>
                                <h4 class="card-title">Skor</h4>
                                <p class="card-text"><?= $nilaiprestasi['skor'] ?></p>
                                <h4 class="card-title">Total</h4>
                                <p class="card-text"><?= $nilaiprestasi['total'] ?></p>
                                <h4 class="card-title">Tahun Usulan</h4>
                                <p class="card-text"><?= $nilaiprestasi['tahun'] ?></p>
                                <h4 class="card-title">Jenis Beasiswa</h4>
                                <p class="card-text"><?= $nilaiprestasi['jenisbeasiswa'] ?></p>
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
