@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Criteria Weight Data Details</h3>
            <form action="/bobotkriteria/{{ $bobotkriteria->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Criteria Weight ID</h4>
                                <p class="card-text"><?= $bobotkriteria['id'] ?></p>
                                <h4 class="card-title">Proposed Year</h4>
                                <p class="card-text"><?= $bobotkriteria['tahun'] ?></p>
                                <h4 class="card-title">Types of Scholarships</h4>
                                <p class="card-text"><?= $bobotkriteria['jenisbeasiswa'] ?></p>
                                <h4 class="card-title">IPK Criteria Weight</h4>
                                <p class="card-text"><?= $bobotkriteria['bobotkriteriaipk'] ?></p>
                                <h4 class="card-title">Achievement Criteria Weight</h4>
                                <p class="card-text"><?= $bobotkriteria['bobotkriteriaprestasi'] ?></p>
                                <h4 class="card-title">Income Criteria Weight</h4>
                                <p class="card-text"><?= $bobotkriteria['bobotkriteriapenghasilan'] ?></p>
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
