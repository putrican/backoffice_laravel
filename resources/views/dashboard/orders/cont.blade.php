@extends('dashboard.layouts.main')

@section('container')

    <div class="container mt-5">
        <form action="{{ route('orders.cont', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

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
                        <h3 class="text-left">No Cont</h3>
                        <div class="form-group">
                            <label class="font-weight-bold">No Container</label>
                            <input type="text" class="form-control @error('no_cont') is-invalid @enderror"
                                name="no_cont" value="{{ old('no_cont') }}" placeholder="Masukkan no cont">
                            @error('no_cont')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Save  
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
