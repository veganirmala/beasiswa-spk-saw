@include('template.header')
@include('template.sidebar')
@include('template.navbar')

{{-- @dd($file_path) --}}
<!-- Content Wrapper. Contains page content -->

{{-- @dd($file_path->dokumenkhs) --}}
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data Berkas Mahasiswa</h3>
            @if ($berkasmahasiswa == null)
                <p>Data tidak ditemukan. Data mahasiswa tersebut tidak ada.</p>
            @else
                <div class="card mb-3 col-lg-12" style="max-width: 768px;">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="m-4">
                                <h4 class="card-title">NIM</h4>
                                <p class="card-text"><?= $berkasmahasiswa['nim'] ?></p>
                            </div>
                            <div class="card-body" style="display: flex; flex-direction:column; gap:16px;">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">Dokumen KHS</h4>
                                        <a href="{{ $file_path->dokumenkhs }}" target="_blank">Open file</a>
                                    </div>
                                    <iframe src="{{ $file_path->dokumenkhs }}" frameborder="0" width="100%"
                                        height="480px"></iframe>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">Dokumen Penghasilan Orang Tua</h4>
                                        <a href="{{ $file_path->dokumenpenghasilan }}" target="_blank">Open file</a>
                                    </div>
                                    <iframe src="{{ $file_path->dokumenpenghasilan }}" frameborder="0" width="100%"
                                        height="480px"></iframe>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">Dokumen Nilai Prestasi</h4>
                                        <a href="{{ $file_path->dokumennilaiprestasi }}" target="_blank">Open file</a>
                                    </div>
                                    <iframe src="{{ $file_path->dokumennilaiprestasi }}" frameborder="0" width="100%"
                                        height="480px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </button>
            @endif
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
