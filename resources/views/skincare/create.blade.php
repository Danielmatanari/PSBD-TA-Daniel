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

        <h5 class="card-title fw-bolder mb-3">Add skincare</h5>

		<form method="post" action="{{ route('skincare.store') }}">
			@csrf
            <div>
                <label for="id_skincare">ID skincare</label>
                <input type="text" id="id_skincare" name="id_skincare">
            </div>
			<div>
                <label for="nama_skincare">Nama skincare</label>
                <input type="text"  id="nama_skincare" name="nama_skincare">
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="text" id="harga" name="harga">
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="text" id="stock" name="stock">
            </div>
            <div>
                <label for="id_perusahaan">ID Perusahaan</label>
                <input type="text" id="id_perusahaan" name="id_perusahaan">
            </div>
            <div>
                <label for="id_toko">ID toko</label>
                <input type="text" id="id_toko" name="id_toko">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>
		</form>
	</div>
</div>

@stop
