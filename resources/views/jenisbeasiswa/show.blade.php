@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Detail Data Jenis Beasiswa</h3>
            <form action="/jenisbeasiswa/{{ $jenisbeasiswa->id }}" method="POST">
                 @csrf
            <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">ID Jenis Beasiswa</h4>
                            <p class="card-text">{{ $jenisbeasiswa->id }}</p>
                            <h4 class="card-title">Nama Jenis Beasiswa</h4>
                            <p class="card-text">{{ $jenisbeasiswa->jenisbeasiswa }}</p>
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