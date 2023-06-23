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
            <h1 class="m-0">Data User</h1>
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
        <div class="alert alert-success" role="alert">
          {{ session('success')  }}
        </div>
    @endif


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <a href="/user/create" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"></i> Tambah</a>
                <p></p>
                <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>JENIS KELAMIN</th>
                    <th>TELEPON</th>
                    <th>ALAMAT</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                       
                        <div class="alert alert-danger" role="alert">
                        Data user tidak berhasil ditemukan
                        </div>
                        
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