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

        <h5 class="card-title fw-bolder mb-3">Changed Item Data</h5>

		<form method="post" action="{{ route('skincare.update', $data->id_skincare) }}">
			@csrf
            <div class="mb-3">
                <label for="id_skincare" class="form-label">ID skincare</label>
                <input type="text" class="form-control" id="id_skincare" name="id_skincare" value="{{ $data->id_skincare }}">
            </div>
			<div class="mb-3">
                <label for="nama_skincare" class="form-label">Nama skincare</label>
                <input type="text" class="form-control" id="nama_skincare" name="nama_skincare" value="{{ $data->nama_skincare }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ $data->stock }}">
            </div>
            <div class="mb-3">
                <label for="id_perusahaan" class="form-label">ID perusahaan</label>
                <input type="text" class="form-control" id="id_perusahaan" name="id_perusahaan" value="{{ $data->id_perusahaan }}">
            </div>
            <div class="mb-3">
                <label for="id_toko" class="form-label">ID toko</label>
                <input type="text" class="form-control" id="id_toko" name="id_toko" value="{{ $data->id_toko }}">
            </div>
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Change" />
			</div>
		</form>
	</div>
</div>

@stop
