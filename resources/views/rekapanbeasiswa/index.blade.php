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
            <h1 class="m-0">Data Rekapan Beasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (session()->has('success'))
        <div class="alert alert-success col-12" role="alert">
          {{ session('success')  }}
        </div>
    @endif


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                    <!-- tampilin tahun usulan aktif -->
                    <div class="form-group">
                        <form action="" class="form-inline my-2 my-lg-0" method="post">
                            <select name="th" class="custom-select mr-1" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected>Pilih Tahun Usulan</option>
                                @foreach ($thusulan as $tahunusulan)
                                <option value="{{ $tahunusulan->id }}">{{ $tahunusulan->tahun }}</option>
                                @endforeach
                            </select>
                            <div class="input-group">
                                <button class="btn btn-secondary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    <a href="" class="btn btn-primary" title="Sinkronisasi Data"><i class="fas fa-spinner"></i> Sinkronisasi</a>
                    <a href="" class="btn btn-info" title="Cetak Data"><i class="fas fa-file-download"></i> Cetak</a>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card shadow mb-4">
                <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Tahun Usulan</th>
                    <th>Skor IPK</th>
                    <th>Skor Pribadi</th>
                    <th>Skor Prestasi</th>
                    <th>Skor Ekonomi</th>
                    <th>Skor Total</th>
                    <th>Status Kelayakan</th>
                    <th>Ranking</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($rekapan)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Rekapan Beasiswa tidak berhasil ditemukan
                    </div>
                <?php endif; ?>
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