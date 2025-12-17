@extends('template.template')

{{-- Section Judul Halaman --}}
@section('title')
    Create New Item
@endsection

@section('desc')
    Form Create item. Please fill input bellow!
@endsection

@section('content')
    {{-- alert saat ada error validasi --}}

    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps!</strong> Error.

            <ol>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ol>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group mt-2">
            <label for="">Item Name</label>
            <input type="text" name="item_name" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="">Item Stock</label>
            <input type="number" name="stock" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="">Image</label>
            <input type="file" accept="image/*" name="image" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="">Item Description</label>
            <textarea name="desc" class="form-control" id=""></textarea>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-success">save</button>
        </div>
    </form>
@endsection
