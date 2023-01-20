@extends('dashboard.layouts.main')

@section('container')
    <form action="{{ route('kurs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <main>
            <div class="row mb-4">
                <div class="col-lg-8 col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="container">
                                    <h1> New Kurs</h1>
                                    <div class="separator mb-5"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="form-group">
                                            <h6 class="font-weight-bold">Mata Uang</h6>
                                            <select class="custom-select @error('mata_uang') is-invalid @enderror"
                                                name="mata_uang" value="{{ old('mata_uang') }}" placeholder="Masukkan Kurs">
                                                <option value="RMB">RMB</option>
                                                <option value="$">$</option>
                                                <option value="Rp">Rp</option>
                                            </select>
                                            @error('mata_uang')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-lg-6">
                                        <div class="form-group ">
                                            <h6 class="font-weight-bold">NILAI</h6>

                                            <input type="text" id="mata_uang" onkeyup="sum();"
                                                class="form-control  @error('nilai') is-invalid @enderror"
                                                type-currency="IDR" name="nilai" value="{{ old('nilai') }}"
                                                placeholder="Masukkan Nilai">
                                            @error('nilai')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <a href="{{ route('kurs.index') }}" class="btn btn-md btn-primary">BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </main>
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
