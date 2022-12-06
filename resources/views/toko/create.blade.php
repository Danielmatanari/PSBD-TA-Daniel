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

        <h5 class="card-title fw-bolder mb-3">Tambah Toko</h5>

		<form method="post" action="{{ route('toko.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_toko" class="form-label">ID Toko</label>
                <input type="text" class="form-control" id="id_toko" name="id_toko">
            </div>
			<div class="mb-3">
                <label for="nama_toko" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko">
            </div>
            <div class="mb-3">
                <label for="alamat_toko" class="form-label">Alamat Toko</label>
                <input type="text" class="form-control" id="alamat_toko" name="alamat_toko">
            </div>
            <div class="mb-3">
                <label for="pemilik_toko" class="form-label">Pemilik Toko</label>
                <input type="text" class="form-control" id="pemilik_toko" name="pemilik_toko">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp">
            </div>
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
