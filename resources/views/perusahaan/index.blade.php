@extends('menu')

@section('container')

<h4 class="mt-5">Data perusahaan</h4>
<a href="{{ route('perusahaan.create') }}" type="button" class="btn btn-success rounded-3">Add perusahaan</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Perusahaan</th>
        <th>Nama perusahaan</th>
        <th>Alamat Perusahaan</th>
        <th>No Telepon</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->id_perusahaan }}</td>
                <td>{{$data->nama_perusahaan }}</td>
                <td>{{$data->alamat_perusahaan }}</td>
                <td>{{$data->telp_perusahaan }}</td>
                <td>
                <a href="{{ route('perusahaan.edit', $data->id_perusahaan) }}" type="button" class="text-center btn btn-info rounded-3">Change</a>
                <form action="{{route ('perusahaan.delete', $data->id_perusahaan)}}" method="post" class="text-center d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('serius?')">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach

            </td>
        </tr>
    </tbody>
</table>
@stop
