@extends('dashboard.layouts.main')

@section('container')


    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">               
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('kurs.create') }}" class="btn btn-outline-primary mb-2"><i
                                    class="simple-icon-docs"></i>
                                Add Mata Uang </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr class="header">
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Mata Uang</th>
                                    <th scope="col" class="text-center">Nilai</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($curs as $curs)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $curs->mata_uang }}</td>
                                        <td class="text-center">{{ number_format($curs->nilai) }}</td>
                                        <td class="text-center"><a href="/dashboard/kurs/edit/{{ $curs->id }}"
                                                class="btn btn-outline-primary"><i
                                                    class="glyph-icon iconsminds-file-edit"></i></a></td>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data belum Tersedia.
                                        </div>
                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @include('sweetalert::alert')

    @endsection
    <script>
        function getKurs(selectObject) {
            var value = selectObject.value;
            if (value == 'Rp') {
                let hasil = document.getElementById("approve_price").value;
                document.getElementById("rate_kurs_a").value = hasil

                let hasil1 = document.getElementById("approve_price").value;
                document.getElementById("harga_kurs_a").value = hasil1
            }
            console.log(value);
        }
        setTimeout(function() {
            $(".alert").remove();
        }, 3000);
    </script>
