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
@endsection
