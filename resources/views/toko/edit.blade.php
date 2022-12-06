@extends('menu')

@section('container')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Changed toko</h5>

		<form method="post" action="{{ route('toko.update', $data->id_toko) }}">
			@csrf
            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID toko</label>
                <input type="text" class="form-control" id="id_toko" name="id_toko" value="{{ $data->id_toko }}">
            </div>
			<div class="mb-3">
                <label for="nama_toko" class="form-label">Nama toko</label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $data->nama_toko }}">
            </div>
            <div class="mb-3">
                <label for="alamat_toko" class="form-label">Alamat Toko</label>
                <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="{{ $data->alamat_toko }}">
            </div>
            <div class="mb-3">
                <label for="pemilik_toko" class="form-label">Pemilik toko</label>
                <input type="text" class="form-control" id="pemilik_toko" name="pemilik_toko" value="{{ $data->pemilik_toko }}">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $data->no_telp }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
