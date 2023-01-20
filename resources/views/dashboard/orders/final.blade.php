@extends('dashboard.layouts.main')

@section('container')
    <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Upload Final Packing List?
    </button> 

    <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container mt-3">
                        <h2>Please Final Packing List</h2>
                        <hr>
                        <form action="{{ route('orders.viewFinalUpload', $order->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="berkas">Drag and drop files here or upload from</label>
                                <input type="file" name="berkas" id="berkas" class="form-control-file">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Upload</button>
                </div>
            </div>
        </div>
    </div> 
@endsection

