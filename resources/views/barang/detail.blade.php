@extends('template.template')

{{-- Section Judul Halaman --}}
@section('title')
    {{ $data->item_name }}
@endsection

@section('desc')
    Detail item {{ $data->item_name }}
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>Item Name</td>
                <td>{{ $data->item_name }}</td>
                <td rowspan="3" class="text-center">
                    <img src="{{ asset('storage/images/items/' . $data->image) }}" alt="item image" width="200px"
                        class="img-fluid">
                </td>
            </tr>
            <tr>
                <td>stock</td>
                <td>{{ $data->stock }}</td>
            </tr>
            <tr>
                <td>description</td>
                <td>{{ $data->desc }}</td>
            </tr>
        </table>
    </div>

    <div class="mt-2">
        <form action="#" method="post">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-outline-danger">🗑️</button>
            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#showModal">
                🖊️
            </button>

        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('item.update', $data->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="modal-body">
                        <div class="form-group mt-2">
                            <label for="">Item Name</label>
                            <input type="text" name="item_name" value="{{ $data->item_name }}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Item Stock</label>
                            <input type="number" name="stock" value="{{ $data->stock }}" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Item Description</label>
                            <textarea name="desc" class="form-control" id="">{{ $data->desc }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
