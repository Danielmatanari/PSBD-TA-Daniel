{{-- @extends('menu')

@section('container')
<h4 class="mt-5">Rincian</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif
<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID rincian</th>
        <th>Nama rincian</th>
        <th>Harga</th>
        <th>Stock</th>
        <th>Nama perusahaan</th>
        <th>Nama toko</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_skincare }}</td>
                <td>{{ $data->nama_skincare}}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->stock }}</td>
                <td>{{ $data->nama_perusahaan }}</td>
                <td>{{ $data->nama_toko }}</td>

            @endforeach
    </tbody>
</table>
@stop --}}
