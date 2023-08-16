@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Add Criteria Weight Data</h3>
            <form action="/bobotkriteria/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idtahunusulan">Proposed Year<span style="color:red;">*</span></label>
                    <select class="form-control @error('idtahunusulan') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="idtahunusulan" id="idtahunusulan" value="{{ old('idtahunusulan') }}">
                        @foreach ($thusulan as $thusulann)
                            <option value="{{ $thusulann->id }}">{{ $thusulann->tahun }}</option>
                        @endforeach
                    </select>
                    @error('idtahunusulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idjenisbeasiswa">Types of Scholarships<span style="color:red;">*</span></label>
                    <select class="form-control @error('idjenisbeasiswa') is-invalid @enderror" tabindex="-1"
                        aria-hidden="true" name="idjenisbeasiswa" id="idjenisbeasiswa"
                        value="{{ old('idjenisbeasiswa') }}">
                        @foreach ($jenis as $jenisbeasiswaa)
                            <option value="{{ $jenisbeasiswaa->id }}">{{ $jenisbeasiswaa->jenisbeasiswa }}</option>
                        @endforeach
                    </select>
                    @error('idjenisbeasiswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobotkriteriaipk">IPK Weight<span style="color:red;">*</span></label>
                    <input type="text" name="bobotkriteriaipk"
                        class="form-control @error('bobotkriteriaipk') is-invalid @enderror" id="bobotkriteriaipk"
                        placeholder="IPK Weight" required value="{{ old('bobotkriteriaipk') }}">
                    @error('bobotkriteriaipk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobotkriteriaprestasi">Achievement Weight<span style="color:red;">*</span></label>
                    <input type="text" name="bobotkriteriaprestasi"
                        class="form-control @error('bobotkriteriaprestasi') is-invalid @enderror"
                        id="bobotkriteriaprestasi" placeholder="Achievement Weight" required
                        value="{{ old('bobotkriteriaprestasi') }}">
                    @error('bobotkriteriaprestasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bobotkriteriapenghasilan">Income Weight<span style="color:red;">*</span></label>
                    <input type="text" name="bobotkriteriapenghasilan"
                        class="form-control @error('bobotkriteriapenghasilan') is-invalid @enderror"
                        id="bobotkriteriapenghasilan" placeholder="Income Weight" required
                        value="{{ old('bobotkriteriapenghasilan') }}">
                    @error('bobotkriteriapenghasilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                    Save
                </button>
                <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                    Back
                </button>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
