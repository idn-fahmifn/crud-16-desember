@extends('template.template')

{{-- Section Judul Halaman --}}
@section('title')
    Items
@endsection

@section('desc')
    list of items. Please click detail to spesific item.
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <th>Item Name</th>
                <th>Desc</th>
                <th>#</th>
            </thead>
            <tbody>

                @forelse ($data as $item)
                    <tr>
                        <td>{{$item->item_name}}</td>
                        <td>{{ Str::limit($item->desc, 40, '...') }}</td>
                        <td><a href="" class="btn btn-info">detail</a></td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3"> ⚠️ Items not found </td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>
@endsection
