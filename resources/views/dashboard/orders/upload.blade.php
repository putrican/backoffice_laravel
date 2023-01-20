@extends('dashboard.layouts.main')

@section('container')
    <div class="modal fade" id="exampleModal2{{ $order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container mt-5">
                        <form action="{{ route('orders.viewFileUpload', $order->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="container">
                                <h5 class="text-center">Please Upload File Packing
                                    List
                                </h5>
                                <div class="custom-file mt-5">
                                    <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                    <label class="custom-file-label" for="chooseFile">Choose File</label>
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-primary">Upload File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
