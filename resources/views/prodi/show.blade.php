@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Study Program Details</h3>
            <form action="/prodi/{{ $prodi->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Study Program ID</h4>
                                <p class="card-text"><?= $prodi['id'] ?></p>
                                <h4 class="card-title">Study Program Name</h4>
                                <p class="card-text"><?= $prodi['namaprodi'] ?></p>
                                <h4 class="card-title">@livewireStyles</h4>
                                <p class="card-text"><?= $prodi['jenjang'] ?></p>
                                <h4 class="card-title">Department Name</h4>
                                <p class="card-text"><?= $prodi['namajurusan'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                Back
            </button>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
