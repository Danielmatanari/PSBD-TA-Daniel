@extends('menu')

@section('container')
<h4 class="mt-5">Data Sampah</h4>

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Skincare</th>
        <th>Nama Skincare</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Nama Perusahaan</th>
        <th>Nama Toko</th>
        <th>Tanggal Terhapus</th>
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
                <td>{{ $data->deleted_at }}</td>
                <td>
                <a href="{{ route('skincare.restore', $data->id_skincare) }}" type="button" class="btn btn-warning rounded-3">Restore</a>
                <form action="{{ route('skincare.hardDelete', $data->id_skincare) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('serius ?')">Hapus</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop
