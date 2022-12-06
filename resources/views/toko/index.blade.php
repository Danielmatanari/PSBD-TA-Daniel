@extends('menu')

@section('container')

<h4 class="mt-5">Data Toko</h4>
<a href="{{ route('toko.create') }}" type="button" class="btn btn-success rounded-3">Add Toko</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Toko</th>
        <th>Nama Toko</th>
        <th>Alamat Toko</th>
        <th>Pemilik Toko</th>
        <th>Nomor Telepon</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_toko }}</td>
                <td>{{ $data->nama_toko }}</td>
                <td>{{ $data->alamat_toko }}</td>
                <td>{{ $data->pemilik_toko }}</td>
                <td>{{ $data->no_telp }}</td>
                <td>
                <a href="{{ route('toko.edit', $data->id_toko) }}" type="button" class="btn btn-info rounded-3">Change</a>
                <form action="{{route ('toko.delete', $data->id_toko)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Serius?')">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach

            </td>
        </tr>
    </tbody>
</table>
@stop
