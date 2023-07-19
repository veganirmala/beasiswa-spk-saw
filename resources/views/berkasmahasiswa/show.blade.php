@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data Berkas Mahasiswa</h3>
            <form action="/berkasmahasiswa/{{ $berkasmahasiswa->nim }}" method="POST">
                @method('put')
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">NIM</h4>
                                <p class="card-text"><?= $berkasmahasiswa['nim'] ?></p>
                                <h4 class="card-title">Dokumen KHS</h4>
                                {{-- <iframe src="/assets/{{ $berkasmahasiswa->dokumenkhs }}" frameborder="0"></iframe> --}}
                                <iframe src="public/storage/uploads/1815323055_dokumenkhs.pdf" frameborder="0"></iframe>
                                <h4 class="card-title">Dokumen Penghasilan Orang Tua</h4>
                                <p class="card-text"><?= $berkasmahasiswa['dokumenpenghasilan'] ?></p>
                                <h4 class="card-title">Dokumen Nilai Prestasi</h4>
                                <p class="card-text"><?= $berkasmahasiswa['dokumennilaiprestasi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                Simpan
            </button>
            <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                Kembali
            </button>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
