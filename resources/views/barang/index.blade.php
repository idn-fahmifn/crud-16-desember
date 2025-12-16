@extends('template.template')

{{-- Section Judul Halaman --}}
@section('title')
    Items
@endsection

@section('desc')
    list of items. Please click detail to spesific item.
@endsection

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th>Item Name</th>
            <th>Desc</th>
        </thead>
        <tbody>
            <tr>
                <td>monitor</td>
                <td>{{ Str::limit('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos incidunt deserunt impedit totam tempore harum rem.', 40, '...') }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
