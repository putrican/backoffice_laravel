@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Form Order</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Home</a>
                        </li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class=col-12>
                                <a href="{{ route('orders.create') }}" class="btn btn-outline-primary mb-2"><i
                                        class="simple-icon-docs"></i>
                                    New Form Order</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-responsive" id="categoryTbl">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Marketing</th>
                                        <th scope="col" class="text-center">Marking</th>
                                        <th scope="col" class="text-center">Item</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Total Invoice</th>
                                        <th scope="col" class="text-center">Keterangan</th>
                                        <th scope="col" class="text-center">Approve Price</th>
                                        <th scope="col" class="text-center">No.BL/No.Cont</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td class="text-center ">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $order->marketing }}</td>
                                            <td class="text-center">{{ $order->marking }}</td>
                                            <td class="text-center">{{ $order->item }}<br>{{ $order->qty }} x
                                                {{ $order->size }}<br><span
                                                    class="text1">{{ $order->asal }}</span>=><span
                                                    class="text2">{{ $order->port }}</span></td>
                                            <td class="text-left">Rp.{{ number_format($order->total) }}
                                                <div class="container">
                                                    <p type="" id="text-right" data-toggle="collapse"
                                                        data-target="#demo{{ $order->id }}">
                                                        Details.</p>
                                                    <div id="demo{{ $order->id }}" class="collapse">
                                                        <span class="text3">
                                                            <p class="text5">Harga Custom: </p>
                                                            Rp.{{ number_format($order->harga_custom) }}
                                                        </span>
                                                        <span class="text3">
                                                            <p class="text5">Harga Kapal: </p>
                                                            Rp.{{ number_format($order->harga_kapal) }}
                                                        </span>
                                                        <span class="text3">
                                                            <p class="text5">Harga Gudang: </p>
                                                            Rp.{{ number_format($order->harga_gudang) }}
                                                        </span>
                                                        @if ($role == 'Admin')
                                                            <span>
                                                                <p class="text5">Keterangan: </p>
                                                                {{ $order->keterangan_approve }}
                                                            </span>
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $order->mata_uang_1 ?? '' }}
                                                {{ number_format($order->total_invoice_rmb) }}<br><br>Rp.{{ number_format($order->rate_kurs) }}
                                            </td>
                                            <td class="text-center">{{ $order->keterangan }}</span></td>

                                            <td class="text-center">
                                                @if ($order->approve > 0)
                                                    <span class="text-success">
                                                        {{ $order->mata_uang_2 ?? '' }} {{ number_format($order->approve) }}</span><br><br><span
                                                        class="text-success">Rp.{{ number_format($order->rate_kurs_a) }}</span>
                                                @else
                                                    <span>{{ number_format($order->approve) }}</span><br><br><span>Rp.{{ number_format($order->rate_kurs_a) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $order->no_bl }}/{{ $order->no_cont }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-outline-primary dropdown-toggle mb-1"
                                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#modalFile{{ $order->id }}">Upload PL
                                                                <li><a href="{{ asset($order->file) }}"><i
                                                                            class="iconsminds-download-1"></i>Download</a>
                                                                </li>
                                                            </button>
                                                            <a class="dropdown-item"
                                                                href="/dashboard/orders/edit/{{ $order->id }}">Edit</a>
                                                            @if ($role == 'Admin')
                                                                <button type="button" class="dropdown-item"
                                                                    data-toggle="modal"
                                                                    data-target="#modalApprove{{ $order->id }}">
                                                                    Approve Price
                                                                </button>
                                                            @else
                                                            @endif
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#modalCont{{ $order->id }}">
                                                                No Cont/No BL
                                                            </button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#exampleModal1{{ $order->id }}">
                                                                Final PL
                                                                <a href="{{ asset($order->final) }}"><br><i
                                                                        class="iconsminds-download-1"></i>Download</a><br>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  Modal Upload Packing List  --}}
                                                <div class="modal fade" id="modalFile{{ $order->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="container mt-5">
                                                                    <form
                                                                        action="{{ route('orders.viewFileUpload', $order->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <div class="container">
                                                                            <h5 class="text-center">Please Upload
                                                                                File
                                                                                Packing
                                                                                List
                                                                            </h5>
                                                                            <div class="custom-file mt-5">
                                                                                <input type="file" name="file"
                                                                                    class="custom-file-input"
                                                                                    id="chooseFile">
                                                                                <label class="custom-file-label"
                                                                                    for="chooseFile">Choose
                                                                                    File</label>
                                                                            </div>
                                                                            <hr>
                                                                            <button type="submit" name="submit"
                                                                                class="btn btn-primary">Upload
                                                                                File</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Approve Price-->
                                                <div class="modal fade" id="modalApprove{{ $order->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <div class="container mt-5">
                                                                    <form
                                                                        action="{{ route('orders.approve', $order->id) }} "
                                                                        method="POST" enctype="multipart/form-data"
                                                                        name="app">
                                                                        @csrf
                                                                        @method('POST')

                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-3">
                                                                                    <div class="form-group">
                                                                                        <h6 class="font-weight-bold">
                                                                                            KURS
                                                                                        </h6>
                                                                                        <select
                                                                                            class="custom-select @error('kurs_a') is-invalid @enderror"{{ $order->id }}
                                                                                            id="mySelects{{ $order->id }}"
                                                                                            onchange="kali_1('{{ $order->id }}');"
                                                                                            name="kurs_a"
                                                                                            value="{{ old('kurs_a') }}">
                                                                                            {{-- <option value="">Pilih Kurs</option> --}}
                                                                                            @foreach ($curs as $cursa)
                                                                                                <option
                                                                                                    value="{{ $cursa->id }}"
                                                                                                    nilai="{{ $cursa->nilai }}">
                                                                                                    {{ $cursa->mata_uang }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        {{-- <select
                                                                                            class="custom-select @error('kurs_a ') is-invalid @enderror"
                                                                                            id="mySelects{{ $order->id }}"
                                                                                            onchange="kali_1('{{ $order->id }}')"
                                                                                            name="kurs_a"
                                                                                            value="{{ old('kurs_a') }}">

                                                                                            @foreach ($curs as $cursa)
                                                                                                <option
                                                                                                    value="{{ $cursa->id }}">
                                                                                                    {{ $cursa->mata_uang }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select> --}}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-9">
                                                                                    <div class="form-group">
                                                                                        <h6 class="font-weight-bold">
                                                                                            APPROVE PRICE</h6>
                                                                                        <input type="text"
                                                                                            id="hasil_a{{ $order->id }}"
                                                                                            onkeyup="kali_1('{{ $order->id }}');"
                                                                                            class="form-control @error('approve') is-invalid @enderror"
                                                                                            type-currency="IDR"
                                                                                            name="approve"
                                                                                            value="{{ old('approve') }}"
                                                                                            placeholder="Masukkan Approve">
                                                                                        @error('approve')
                                                                                            <div
                                                                                                class="alert alert-danger mt-2">
                                                                                                {{ $message }}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <h6 class="font-weight-bold">RATE
                                                                                        </h6>
                                                                                        <input type="text"
                                                                                            id="rate_kurs_a{{ $order->id }}"
                                                                                            onkeyup="kali_1('{{ $order->id }}');" readonly
                                                                                            class="form-control @error('rate_kurs_a') is-invalid @enderror"
                                                                                            type-currency="IDR"
                                                                                            name="rate_kurs_a"
                                                                                            value="{{ old('rate_kurs_a') }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <h6 class="font-weight-bold">
                                                                                        KETERANGAN</h6>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            class="form-control @error('keterangan') is-invalid @enderror"
                                                                                            name="keterangan"
                                                                                            value="{{ old('keterangan') }}"
                                                                                            placeholder="Masukkan keterangan ">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <button type="submit"
                                                                                            name="submit"
                                                                                            class="btn btn-primary btn-block mt-4">
                                                                                            Save
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  Modal Final Packing List  --}}
                                                <div class="modal fade" id="exampleModal1{{ $order->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="container mt-5">
                                                                    <form
                                                                        action="{{ route('orders.viewFinalUpload', $order->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <div class="container">
                                                                            <h5 class="text-center">Please Upload
                                                                                Final
                                                                                Packing
                                                                                List</h5>
                                                                            <div class="custom-file mt-5">
                                                                                <input type="file" name="file"
                                                                                    class="custom-file-input"
                                                                                    id="chooseFile">
                                                                                <label class="custom-file-label"
                                                                                    for="chooseFile">Choose
                                                                                    File</label>
                                                                            </div>
                                                                            <hr>
                                                                            <button type="submit" name="submit"
                                                                                class="btn btn-primary">Upload
                                                                                File</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  Modal No Cont  --}}
                                                <div class="modal fade" id="modalCont{{ $order->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <div class="container mt-5">
                                                                    <form action="{{ route('orders.cont', $order->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h3 class="text-left">No BL
                                                                                    </h3>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            class="form-control @error('no_bl') is-invalid @enderror"
                                                                                            name="no_bl"
                                                                                            value="{{ old('no_bl') }}"
                                                                                            placeholder="Masukkan No BL">
                                                                                        @error('no_bl')
                                                                                            <div
                                                                                                class="alert alert-danger mt-3">
                                                                                                {{ $message }}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <h3 class="text-left">No Cont
                                                                                    </h3>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            class="form-control @error('no_cont') is-invalid @enderror"
                                                                                            name="no_cont"
                                                                                            value="{{ old('no_cont') }}"
                                                                                            placeholder="Masukkan no cont">

                                                                                        @error('no_cont')
                                                                                            <div
                                                                                                class="alert alert-danger mt-3">
                                                                                                {{ $message }}
                                                                                            </div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <button type="submit" name="submit"
                                                                                        class="btn btn-primary btn-block mt-4">
                                                                                        Save
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        </div>
                    </div>
                    </td>

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
    </div>
    </div>
@endsection
{{-- Rate Approve Price --}}
@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
     <script>
        function kali_1(data) {
           
            var f = document.getElementById('mySelects' + data).value;
            var select = document.getElementById('mySelects' + data);
            var hKurs = select.options[select.selectedIndex].getAttribute('nilai');
        
            var x = document.getElementById('hasil_a' + data ).value;
            var hHasilA = parseInt(x.replaceAll(',', ''))


            var result = parseInt(hKurs) * parseInt(hHasilA);

            if (!isNaN(result)) {
                document.getElementById('rate_kurs_a' + data).value = result;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#categoryTbl').DataTable({
                dom: '<"top"fB>rts<"buttom"r>p<"clear">'

            });
        });
    </script>

   
@endpush


{{-- <script>
    function kali_1(data) {
        var d = document.getElementById('mySelects' + data).value;
        var hKursA = parseInt(d.replaceAll(',', ''))

        var e = document.getElementById('hasil' + data).value;
        var hApprove = parseInt(e.replaceAll(',', ''))

        var result = parseInt(hKursA) * parseInt(hApprove);

        if (!isNaN(result)) {
            document.getElementById('rate_kurs_a' + data).value = result;
        }
    }

    setTimeout(function() {
        $(".alert").remove();
    }, 3000);
</script> --}}
