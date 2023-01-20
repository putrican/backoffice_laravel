@extends('dashboard.layouts.main')

@section('container')
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <div class="container">
        {{--  <div class="row">  --}}
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('orders.create') }}" class="btn btn-md btn-primary mb-3"><i
                                    class="simple-icon-docs"></i> NEW FORM ORDER </a>
                        </div>
                        <div class="col-md-12">
                            <div class="d-block d-md-inline-block">
                                <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                    <input class="form-control" placeholder="Search Table" id="searchDatatable">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <br>
                @if (session('edit'))
                    <div class="alert alert-success">
                        {{ session('edit') }}
                    </div>
                @endif
                <div style="overflow-x:auto;">
                    <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        {{-- <table class="table table-bordered" id="datatableRows" class="data_table responsive nowrap"data-order="[[ 1, &quot;desc&quot; ]]"
                        width="100%" cellspacing="0"> --}}
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
                                <th scope="col" class="text-center">No.Cont</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $order->marketing }}</td>
                                    <td class="text-center">{{ $order->marking }}</td>
                                    <td class="text-center">{{ $order->item }}<br>{{ $order->qty }} x
                                        {{ $order->size }}<br><span class="text1">{{ $order->asal }}</span> => <span
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
                                                        <p class="text5">Keterangan: </p>{{ $order->keterangan_approve }}
                                                    </span>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{ $order->kurs }}{{ number_format($order->total_invoice_rmb) }}<br><br>Rp
                                        @if ($order->kurs == '¥')
                                            {{ number_format($order->total_invoice_rmb * $rate_yuan) }}
                                        @elseif($order->kurs == '$')
                                            {{ number_format($order->total_invoice_rmb * $rate_usd) }}
                                        @else
                                            {{ number_format($order->total_invoice_rmb) }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $order->keterangan }}</span></td>
                                    <td class="text-center">
                                        {{ $order->kurs_a }}{{ number_format($order->approve) }}<br><br>Rp
                                        @if ($order->kurs_a == '¥')
                                            {{ number_format($order->approve * $rate_yuan) }}
                                        @elseif($order->kurs_a == '$')
                                            {{ number_format($order->approve * $rate_usd) }}
                                        @else
                                            {{ number_format($order->approve) }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $order->no_cont }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-outline-primary dropdown-toggle mb-1" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button type="button" class="dropdown-item " data-toggle="modal"
                                                        data-target="#exampleModal2{{ $order->id }}">
                                                        Upload Packing List
                                                        <a href="{{ asset($order->file) }}"><br><i
                                                                class="iconsminds-download-1"></i>Download</a><br>
                                                    </button>
                                                    <a class="dropdown-item"
                                                        href="/dashboard/orders/edit/{{ $order->id }}">Edit</a>

                                                    @if ($role == 'Admin')
                                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                                            data-target="#exampleModal{{ $order->id }}">
                                                            Approve Price
                                                        </button>
                                                    @else
                                                    @endif
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#exampleModal3{{ $order->id }}">
                                                        No Container
                                                    </button>
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#exampleModal1{{ $order->id }}">
                                                        Final Packing List
                                                        <a href="{{ asset($order->final) }}"><br><i
                                                                class="iconsminds-download-1"></i>Download</a><br>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  Modal Upload Packing List  --}}
                                        <div class="modal fade" id="exampleModal2{{ $order->id }}" tabindex="-1"
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
                                                                    <h5 class="text-center">Please Upload File Packing List
                                                                    </h5>
                                                                    <div class="custom-file mt-5">
                                                                        <input type="file" name="file"
                                                                            class="custom-file-input" id="chooseFile">
                                                                        <label class="custom-file-label"
                                                                            for="chooseFile">Choose File</label>
                                                                    </div>
                                                                    <hr>
                                                                    <button type="submit" name="submit"
                                                                        class="btn btn-primary">Upload File</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Approve Price-->
                                        <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div class="container mt-5">
                                                            <form action="{{ route('orders.approve', $order->id) }} "
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                {{--  <div class="container">  --}}
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h3 class="text-left">Approve Price</h3>
                                                                        <div class="">
                                                                            <div class="form-group">
                                                                                <h6 class="font-weight-bold">KURS</h6>
                                                                                <select
                                                                                    class="custom-select @error('kurs_a  ') is-invalid @enderror"
                                                                                    id="mySelect" onchange="myFunction()"
                                                                                    name="kurs_a"
                                                                                    value="{{ old('kurs_a') }}">
                                                                                    <option value="¥">¥ </option>
                                                                                    <option value="$">$</option>
                                                                                    <option value="Rp">Rp </option>
                                                                                </select>
                                                                            </div>
                                                                            {{-- <div class="form-group">
                                                                                <select
                                                                                    class="custom-select @error('kurs  ') is-invalid @enderror"
                                                                                    id="mySelect"
                                                                                    name="kurs"value="{{ old('kurs') }}">
                                                                                    <option value="">Selected Kurs
                                                                                    </option>
                                                                                    <option value="¥"> ¥ </option>
                                                                                    <option value="$"> $ </option>
                                                                                    <option value="Rp"> Rp </option>
                                                                                </select>
                                                                            </div> --}}
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="form-group">
                                                                                <input type="text"
                                                                                    class="form-control approve @error('approve') is-invalid @enderror"
                                                                                    name="approve"
                                                                                    value="{{ old('approve') }}"
                                                                                    placeholder="Masukkan Approve Price"
                                                                                    onkeydown="return numbersonly(this, event);"
                                                                                    onkeyup="javascript:tandaPemisahTitik(this);">
                                                                            </div>
                                                                        </div>
                                                                        <h3 class="text-left">Keterangan</h3>
                                                                        <div class="">
                                                                            <div class="form-group">
                                                                                <input type="text"
                                                                                    class="form-control @error('keterangan') is-invalid @enderror"
                                                                                    name="keterangan"
                                                                                    value="{{ old('keterangan') }}"
                                                                                    placeholder="Masukkan keterangan ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <button type="submit" name="submit"
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
                <div class="modal fade" id="exampleModal1{{ $order->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="container mt-5">
                                    <form action="{{ route('orders.viewFinalUpload', $order->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <div class="container">
                                            <h5 class="text-center">Please Upload Final Packing
                                                List</h5>
                                            <div class="custom-file mt-5">
                                                <input type="file" name="file" class="custom-file-input"
                                                    id="chooseFile">
                                                <label class="custom-file-label" for="chooseFile">Choose File</label>
                                            </div>
                                            <hr>
                                            <button type="submit" name="submit" class="btn btn-primary">Upload
                                                File</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  Modal No Cont  --}}
                <div class="modal fade" id="exampleModal3{{ $order->id }}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="container mt-5">
                                    <form action="{{ route('orders.cont', $order->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="text-center">No Cont</h3>
                                                    <div class="form-group">

                                                        <input type="text"
                                                            class="form-control @error('no_cont') is-invalid @enderror"
                                                            name="no_cont" value="{{ old('no_cont') }}"
                                                            placeholder="Masukkan no cont">

                                                        @error('no_cont')
                                                            <div class="alert alert-danger mt-3">
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
                </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Belum Tersedia 
                </div>
                @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--  </div>  --}}
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>
    </body>
@endsection





<div class="container">
    <div class="card border-0 shadow rounded">
        <div class="card-body">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('orders.create') }}" class="btn btn-md btn-primary mb-3"><i
                                class="simple-icon-docs"></i> NEW FORM ORDER </a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <br>
            @if (session('edit'))
                <div class="alert alert-success">
                    {{ session('edit') }}
                </div>
            @endif
            <div style="overflow-x:auto;">
                <table class="table table-bordered" id="categoryTbl"
                    class="data_table responsive nowrap"data-order="[[ 1, &quot;desc&quot; ]]" width="100%"
                    cellspacing="0">
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
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $order->marketing }}</td>
                                <td class="text-center">{{ $order->marking }}</td>
                                <td class="text-center">{{ $order->item }}<br>{{ $order->qty }} x
                                    {{ $order->size }}<br><span class="text1">{{ $order->asal }}</span>=><span
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
                                                    <p class="text5">Keterangan: </p>{{ $order->keterangan_approve }}
                                                </span>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-left">
                                    {{ $order->kurs }}{{ number_format($order->total_invoice_rmb) }}Rp
                                    @if ($order->kurs == '¥')
                                        {{ number_format($order->total_invoice_rmb * $rate_yuan) }}
                                    @elseif($order->kurs == '$')
                                        {{ number_format($order->total_invoice_rmb * $rate_usd) }}
                                    @else
                                        {{ number_format($order->total_invoice_rmb) }}
                                    @endif
                                </td>
                                <td class="text-center">{{ $order->keterangan }}</span></td>
                                <td class="text-center">
                                    {{ $order->kurs_a }}{{ number_format($order->approve) }}<br><br>Rp
                                    @if ($order->kurs_a == '¥')
                                        {{ number_format($order->approve * $rate_yuan) }}
                                    @elseif($order->kurs_a == '$')
                                        {{ number_format($order->approve * $rate_usd) }}
                                    @else
                                        {{ number_format($order->approve) }}
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
                                                <button type="button" class="dropdown-item " data-toggle="modal"
                                                    data-target="#exampleModal2{{ $order->id }}">
                                                    Upload Packing List
                                                    <a href="{{ asset($order->file) }}"><br><i
                                                            class="iconsminds-download-1"></i>Download</a><br>
                                                </button>
                                                <a class="dropdown-item"
                                                    href="/dashboard/orders/edit/{{ $order->id }}">Edit</a>

                                                @if ($role == 'Admin')
                                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#exampleModal{{ $order->id }}">
                                                        Approve Price
                                                    </button>
                                                @else
                                                @endif
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#exampleModal3{{ $order->id }}">
                                                    No Container
                                                </button>
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#exampleModal1{{ $order->id }}">
                                                    Final Packing List
                                                    <a href="{{ asset($order->final) }}"><br><i
                                                            class="iconsminds-download-1"></i>Download</a><br>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  Modal Upload Packing List  --}}
                                    <div class="modal fade" id="exampleModal2{{ $order->id }}" tabindex="-1"
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
                                                                <h5 class="text-center">Please Upload File Packing List
                                                                </h5>
                                                                <div class="custom-file mt-5">
                                                                    <input type="file" name="file"
                                                                        class="custom-file-input" id="chooseFile">
                                                                    <label class="custom-file-label"
                                                                        for="chooseFile">Choose File</label>
                                                                </div>
                                                                <hr>
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-primary">Upload File</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Approve Price-->
                                    <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="container mt-5">
                                                        <form action="{{ route('orders.approve', $order->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            {{--  <div class="container">  --}}
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h3 class="text-left">Approve Price</h3>
                                                                    <div class="form-group">
                                                                        <h6 class="font-weight-bold">KURS</h6>
                                                                        <select
                                                                            class="custom-select @error('kurs_a  ') is-invalid @enderror"
                                                                            id="mySelect" onchange="myFunction()"
                                                                            name="kurs_a"
                                                                            value="{{ old('kurs_a') }}">
                                                                            <option value="¥">¥ </option>
                                                                            <option value="$">$</option>
                                                                            <option value="Rp">Rp </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control approve @error('approve') is-invalid @enderror"
                                                                            name="approve"
                                                                            value="{{ old('approve') }}"
                                                                            placeholder="Masukkan Approve Price"
                                                                            onkeydown="return numbersonly(this, event);"
                                                                            onkeyup="javascript:tandaPemisahTitik(this);">
                                                                    </div>

                                                                    <h3 class="text-left">Keterangan</h3>
                                                                    <div class="">
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                                                name="keterangan"
                                                                                value="{{ old('keterangan') }}"
                                                                                placeholder="Masukkan keterangan ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
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

                                    {{--  Modal Final Packing List  --}}
                                    <div class="modal fade" id="exampleModal1{{ $order->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
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
                                                                <h5 class="text-center">Please Upload Final Packing
                                                                    List</h5>
                                                                <div class="custom-file mt-5">
                                                                    <input type="file" name="file"
                                                                        class="custom-file-input" id="chooseFile">
                                                                    <label class="custom-file-label"
                                                                        for="chooseFile">Choose File</label>
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
                                    <div class="modal fade" id="exampleModal3{{ $order->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                        <h3 class="text-left">No Cont</h3>
                                                                        <div class="form-group">

                                                                            <input type="text"
                                                                                class="form-control @error('no_cont') is-invalid @enderror"
                                                                                name="no_cont"
                                                                                value="{{ old('no_cont') }}"
                                                                                placeholder="Masukkan no cont">

                                                                            @error('no_cont')
                                                                                <div class="alert alert-danger mt-3">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h3 class="text-left">No BL</h3>
                                                                        <div class="form-group">

                                                                            <input type="text"
                                                                                class="form-control @error('no_bl') is-invalid @enderror"
                                                                                name="no_bl"
                                                                                value="{{ old('no_bl') }}"
                                                                                placeholder="Masukkan No BL">

                                                                            @error('no_bl')
                                                                                <div class="alert alert-danger mt-3">
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
                                </td>

                            @empty
                                <div class="alert alert-danger">
                                    Data belum Tersedia.
                                </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
