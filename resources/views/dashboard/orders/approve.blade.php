@extends('dashboard.layouts.main')

@section('container')

    <div class="container mt-5">
        <form action="{{ route('orders.viewApprove', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
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
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-left">Approve Harga</h3>
                        <div class="form-group">
                            <label class="font-weight-bold">Approve Harga</label>
                            <input type="number" class="form-control @error('approve') is-invalid @enderror"
                                name="approve" value="{{ old('approve') }}" placeholder="Masukkan Approve Harga">

                            @error('approve')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Approve Harga
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
