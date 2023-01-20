@extends('dashboard.layouts.main')

@section('container')
    {{--  <link rel="stylesheet" href="{{ URL::to('/'); }}/css1/style.css" />  --}}

    <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data" name="crte">
        @csrf
        @method('PATCH')
        <div class="row mb-4">
            <div class="col-lg-8 col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class=col-12>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h1> Edit Form Order</h1>
                                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block"
                                            aria-label="breadcrumb">
                                            <ol class="breadcrumb pt-0">
                                                <li class="breadcrumb-item">
                                                    <a href="/dashboard">Home</a>
                                                </li>

                                            </ol>
                                        </nav>
                                        <div class="separator mb-5"></div>
                                    </div>
                                </div>

                                <div class="card border-0 shadow rounded">
                                    <div class="card-body">
                                        {{-- <h1 class="text-align-center">Edit Form Order</h1>  --}}
                                        <div class="container">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">MARKETING</h6>
                                                            <select
                                                                class="custom-select @error('marketing') is-invalid @enderror"
                                                                name="marketing" placeholder="Masukkan marketing">
                                                                <option
                                                                    value="{{ old('marketing') ?? $order->marketing }} ">
                                                                    {{ $order->marketing }}</option>
                                                                <option value="Marketing1">Marketing1</option>
                                                                <option value="Marketing2">Marketing2</option>
                                                                <option value="Marketing3">Marketing3</option>
                                                                <option value="Marketing4">Marketing4</option>

                                                            </select>
                                                            @error('marketing')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">MARKING</h6>
                                                            <select
                                                                class="custom-select @error('marking') is-invalid @enderror"
                                                                name="marking" placeholder="Masukkan marking">
                                                                <option value="{{ old('marking') ?? $order->marking }}">
                                                                    {{ $order->marking }}</option>
                                                                <option value="Marking1">Marking1</option>
                                                                <option value="Marking2">Marking2</option>
                                                                <option value="Marking3">Marking3</option>
                                                                <option value="Marking4">Marking4</option>
                                                            </select>
                                                            @error('marking')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">ITEM</h6>
                                                            <textarea class="form-control @error('item') is-invalid @enderror" name="item" placeholder="Masukkan item">  {{ old('item') ?? $order->item }}</textarea>
                                                            @error('item')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6 col-lg-2 col-xs-6">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">SIZE</h6>
                                                            <select
                                                                class="custom-select @error('size') is-invalid @enderror"
                                                                name="size" placeholder="Masukkan size">
                                                                <option value="{{ old('size') ?? $order->size }}">
                                                                    {{ $order->size }}
                                                                </option>
                                                                <option value="20">20</option>
                                                                <option value="40">40</option>
                                                                <option value="45">45</option>

                                                            </select>
                                                            @error('size')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-lg-2 col-xs-6">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">QTY</h6>
                                                            <input type="number"
                                                                class="form-control @error('qty') is-invalid @enderror"
                                                                name="qty" value="{{ old('qty') ?? $order->qty }}"
                                                                placeholder="Masukkan qty">

                                                            @error('qty')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-lg-3 col-xs-6">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">ASAL</h6>
                                                            <select
                                                                class="custom-select @error('asal') is-invalid @enderror"
                                                                name="asal" placeholder="Masukkan asal">
                                                                <option value="{{ old('asal') ?? $order->asal }} ">
                                                                    {{ $order->asal }}
                                                                </option>
                                                                <option value="Jakarta">Jakarta</option>
                                                                <option value="Bogor">Bogor</option>
                                                                <option value="Bekasi">Bekasi</option>
                                                                <option value="Etc">Etc</option>
                                                            </select>
                                                            @error('asal')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 col-lg-3 col-xs-6">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">PORT</h6>
                                                            <select
                                                                class="custom-select @error('port') is-invalid @enderror"
                                                                name="port" placeholder="Masukkan port">
                                                                <option value="{{ old('port') ?? $order->port }} ">
                                                                    {{ $order->port }}
                                                                </option>
                                                                <option value="Batam">Batam</option>
                                                                <option value="Medan">Medan</option>
                                                                <option value="Riau">Riau</option>
                                                                <option value="Jakarta">Jakarta</option>
                                                            </select>
                                                            @error('port')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2 col-lg-2 col-xs-2">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">KURS</h6>
                                                            <select
                                                                class="custom-select @error('kurs') is-invalid @enderror"
                                                                id="mySelects" onchange="kali_2();" name="kurs">
                                                                {{-- <option value="">Pilih Kurs</option> --}}
                                                                @foreach ($curs as $curs)
                                                                    @if ($curs->id == $order->curs_id)
                                                                        <option selected value="{{ $curs->id }}"
                                                                            nilai="{{ $curs->nilai }}">
                                                                            {{ $curs->mata_uang }}</option>
                                                                    @else
                                                                        <option value="{{ $curs->id }}"
                                                                            nilai="{{ $curs->nilai }}">
                                                                            {{ $curs->mata_uang }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--  KOLOM2  --}}
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">HARGA CUSTOM</h6>
                                                            <input type="text" id="custom" onkeyup="sum();"
                                                                class="form-control @error('harga_custom') is-invalid @enderror"
                                                                type-currency="IDR" name="harga_custom"
                                                                value="{{ old('harga_custom') ?? $order->harga_custom }}"
                                                                placeholder="Masukkan Harga kapal">
                                                            @error('harga_custom')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">HARGA KAPAL</h6>
                                                            <input type="text" id="kapal" onkeyup="sum();"
                                                                class="form-control @error('harga_kapal') is-invalid @enderror"
                                                                type-currency="IDR" name="harga_kapal"
                                                                value="{{ old('harga_kapal') ?? $order->harga_kapal }}"
                                                                placeholder="Masukkan Harga kapal">
                                                            @error('harga_kapal')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">HARGA GUDANG</h6>
                                                            <input type="text" id="gudang" onkeyup="sum();"
                                                                class="form-control @error('harga_gudang') is-invalid @enderror"
                                                                type-currency="IDR" name="harga_gudang"
                                                                value="{{ old('harga_gudang') ?? $order->harga_gudang }}"
                                                                placeholder="Masukkan Harga Gudang"
                                                                onkeydown="return numbersonly(this, event);"
                                                                onkeyup="javascript:tandaPemisahTitik(this);">

                                                            @error('harga_gudang')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">TOTAL </h6>
                                                            <input type="text" id="total" onkeyup="sum();"
                                                                readonly
                                                                class="form-control @error('total') is-invalid @enderror"
                                                                type-currency="IDR" name="total"
                                                                value="{{ old('total') ?? $order->total }}"
                                                                placeholder="Masukkan total"
                                                                onkeydown="return numbersonly(this, event);"
                                                                onkeyup="javascript:tandaPemisahTitik(this);">
                                                            @error('total')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">TOTAL INVOICE</h6>
                                                            <input type="text" id="hasil" onkeyup="kali_2();"
                                                                class="form-control @error('total_invoice_rmb') is-invalid @enderror"
                                                                type-currency="IDR" name="total_invoice_rmb"
                                                                value="{{ old('total_invoice_rmb') ?? $order->total_invoice_rmb }}"
                                                                placeholder="Masukkan Total Invoice">

                                                            @error('total_invoice_rmb')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">RATE</h6>
                                                            <input type="text" id="rate_kurs" onkeyup="kali_2();"
                                                                readonly
                                                                class="form-control @error('rate_kurs') is-invalid @enderror"
                                                                type-currency="IDR" name="rate_kurs"
                                                                value="{{ old('rate_kurs') ?? $order->rate_kurs }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                                        <div class="form-group">
                                                            <h6 class="font-weight-bold">KETERANGAN</h6>
                                                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                                                placeholder="Masukkan keterangan"> {{ old('keterangan') ?? $order->keterangan }}</textarea>
                                                            @error('keterangan')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                        <a href="{{ route('orders.index') }}" class="btn btn-md btn-primary">CANCEL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
@endsection
@push('scripts')
    <script>
        function kali_2() {
            var f = document.getElementById('mySelects').value;
            var select = document.forms['crte'].elements['kurs'];
            var hKurs = select.options[select.selectedIndex].getAttribute('nilai');
            //var hKurs = parseInt(f.replaceAll(',', ''))

            var g = document.getElementById('hasil').value;
            var hHasil = parseInt(g.replaceAll(',', ''))

            var result = parseInt(hKurs) * parseInt(hHasil);

            if (!isNaN(result)) {
                document.getElementById('rate_kurs').value = result;
            }
        }

        /*
                  $('#mySelect').on('change', function() {
                        var $option = $(this).find(':selected');
                        var nilai = $option.data('nilai');

                        var g = document.getElementById('hasil').value;
                        var hHasil = parseInt(g.replaceAll(',', ''))

                        var result = parseInt(nilai) * parseInt(hHasil);

                        if (!isNaN(result)) {
                            document.getElementById('rate_kurs').value = result;
                        }
                    });
        */
    </script>
@endpush
