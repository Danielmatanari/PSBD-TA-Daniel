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

        <h5 class="card-title fw-bolder mb-3">Detail barang</h5>

			@csrf
            <div class="mb-3">
                <label for="id_skincare" class="form-label">ID barang</label>
                <input type="text" class="form-control" id="id_skincare" name="id_skincare" value="{{ $data->id_skincare }}" readonly>
            </div>
			<div class="mb-3">
                <label for="nama_skincare" class="form-label">nama_skincare</label>
                <input type="text" class="form-control" id="nama_skincare" name="nama_skincare" value="{{ $data->nama_skincare }}" readonly>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}" readonly>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ $data->stock }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ $data->nama_perusahaan }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_toko" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $data->nama_toko }}" readonly>
            </div>
            <div class="text-center">
            <a href="{{ route('skincare.index') }}" type="button" class="btn btn-info rounded-3 text-white" >Kembali</a>
			</div>
            <!-- <a href="{{ route('skincare.index') }}" type="button" class="btn btn-primary rounded-3 text-center" >Kembali</a> -->
		</form>
	</div>
</div>

@stop
