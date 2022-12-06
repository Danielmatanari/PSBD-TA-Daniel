<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 

use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    public function index() {
        $datas = DB::select('select * from tokos');

        return view('toko.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('toko.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_toko' => 'required',
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'pemilik_toko' => 'required',
            'no_telp' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO tokos(id_toko, nama_toko, alamat_toko, pemilik_toko, no_telp) VALUES (:id_toko, :nama_toko, :alamat_toko, :pemilik_toko, :no_telp)',
        [
            'id_toko' => $request->id_toko,
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
            'pemilik_toko' => $request->pemilik_toko,
            'no_telp' => $request->no_telp
        ]
        );

        return redirect()->route('toko.index')->with('success', 'Saved Successfully');
    }

    public function edit($id) {
        $data = DB::table('tokos')->where('id_toko', $id)->first();

        return view('toko.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_toko' => 'required',
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'pemilik_toko' => 'required',
            'no_telp' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE tokos SET id_toko = :id_toko, nama_toko = :nama_toko, alamat_toko = :alamat_toko, pemilik_toko = :pemilik_toko, no_telp = :no_telp WHERE id_toko = :id',
        [
            'id' => $id,
            'id_toko' => $request->id_toko,
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
            'pemilik_toko' => $request->pemilik_toko,
            'no_telp' => $request->no_telp
        ]
        );

        return redirect()->route('toko.index')->with('success', 'Berhasil Ubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM tokos WHERE id_toko = :id_toko', ['id_toko' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('toko.index')->with('success', 'Berhasil Hapus');
    }

}
