@extends('dashboard.layouts.main')

@section('container')
    <form action="{{ route('kurs.update', $curs->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <main>  <div class="row mb-4">
                <div class="col-lg-8 col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="container">
                                    <h1> Edit Kurs</h1>
                                    <div class="separator mb-5"></div>
                                </div>
                            </div>
                            <div class="card-body">

                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="form-group">
                                        <h6 class="font-weight-bold">MATA UANG</h6>
                                        <select class="custom-select @error('mata_uang') is-invalid @enderror"
                                            name="mata_uang" placeholder="Masukkan mata uang">
                                            <option value="{{ old('mata_uang') ?? $curs->mata_uang }} ">
                                                {{ $curs->mata_uang }}</option>
                                            <option value="¥">¥ </option>
                                            <option value="$">$</option>
                                            <option value="RMB">RMB</option>
                                        </select>
                                        @error('mata_uang')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="form-group ">
                                        <h6 class="font-weight-bold">NILAI</h6>

                                        <input type="text" id="mata_uang" onkeyup="sum();"
                                            class="form-control  @error('nilai') is-invalid @enderror" type-currency="IDR"
                                            name="nilai" value="{{ old('nilai') ?? $curs->nilai }}"
                                            placeholder="Masukkan Nilai">
                                        @error('nilai')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>                          
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <a href="{{ route('kurs.index') }}" class="btn btn-md btn-primary">CANCEL</a>
                        </div>
                    </div>
                </div>
        </main>
    </form>
@endsection
<script>
    function getKurs(selectObject) {
        var value = selectObject.value;
        if (value == 'Rp') {
            let hasil = document.getElementById("hasil").value;
            document.getElementById("rate_kurs").value = hasil

            let hasil1 = document.getElementById("hasil").value;
            document.getElementById("harga_kurs").value = hasil1
        }
        console.log(value);
    }
</script>
