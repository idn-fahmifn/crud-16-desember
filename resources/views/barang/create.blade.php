@extends('template.template')

{{-- Section Judul Halaman --}}
@section('title')
    Create New Item
@endsection

@section('desc')
    Form Create item. Please fill input bellow!
@endsection

@section('content')
<form action="" method="post">
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
        <input type="file" name="image" class="form-control">
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
