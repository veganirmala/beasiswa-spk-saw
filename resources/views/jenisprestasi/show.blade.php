@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Data Details of Achievement Types</h3>
            <form action="/jenisprestasi/{{ $jenisprestasi->id }}" method="POST">
                @csrf
                <div class="card mb-3 col-lg-8" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Achievement Type ID</h4>
                                <p class="card-text">{{ $jenisprestasi->id }}</p>
                                <h4 class="card-title">Rating</h4>
                                <p class="card-text">{{ $jenisprestasi->peringkat }}</p>
                                <h4 class="card-title">Achievement Type</h4>
                                <p class="card-text">{{ $jenisprestasi->jenisprestasi }}</p>
                                <h4 class="card-title">Level</h4>
                                <p class="card-text">{{ $jenisprestasi->tingkat }}</p>
                                <h4 class="card-title">Value</h4>
                                <p class="card-text">{{ $jenisprestasi->nilai }}</p>
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
