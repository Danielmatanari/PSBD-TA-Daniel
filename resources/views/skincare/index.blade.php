@extends('menu')

@section('container')

<h4 class="mt-3">Data skincare</h4>
<a href="{{ route('skincare.create') }}" type="button" class="btn btn-success">Add Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID skincare</th>
        <th>Nama skincare</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>ID perusahaan</th>
        <th>ID toko</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_skincare }}</td>
                <td>{{ $data->nama_skincare }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->stock }}</td>
                <td>{{ $data->id_perusahaan }}</td>
                <td>{{ $data->id_toko }}</td>
                <td class="text-center">
                <a href="{{ route('skincare.show', $data->id_skincare) }}" type="button" class="btn btn-primary rounded-3">Show</a>
                <a href="{{ route('skincare.edit', $data->id_skincare) }}" type="button" class="btn btn-info rounded-3">Change</a>
                <form action="{{route ('skincare.softDelete', $data->id_skincare)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('serius ?')">Delete</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop
