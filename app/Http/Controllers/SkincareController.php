<?php

namespace App\Http\Controllers;

use App\Models\Skincare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException; 


class SkincareController extends Controller
{
    public function index() {
        $datas = DB::select('select * from skincares where deleted_at is NULL');

        return view('skincare.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('skincare.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_skincare' => 'required',
            'nama_skincare' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'id_perusahaan' =>'required',
            'id_toko' =>'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO skincares (id_skincare, nama_skincare, harga, stock, id_perusahaan, id_toko) VALUES (:id_skincare, :nama_skincare, :harga, :stock, :id_perusahaan, :id_toko)',
        [
            'id_skincare' => $request->id_skincare,
            'nama_skincare' => $request->nama_skincare,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_perusahaan' => $request->id_perusahaan,
            'id_toko' => $request->id_toko
        ]
        );

        return redirect()->route('skincare.index')->with('success', 'Berhasil Simpan');
    }

    public function edit($id) {
        $data = DB::table('skincares')->where('id_skincare', $id)->first();

        return view('skincare.edit')->with('data', $data);
    }



    public function update($id, Request $request) {
        $request->validate([
            'id_skincare' => 'required',
            'nama_skincare' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'id_perusahaan' =>'required',
            'id_toko' =>'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE skincares SET id_skincare = :id_skincare, nama_skincare = :nama_skincare, harga = :harga, stock = :stock, id_perusahaan = :id_perusahaan, id_toko = :id_toko WHERE id_skincare = :id',
        [
            'id' => $id,
            'id_skincare' => $request->id_skincare,
            'nama_skincare' => $request->nama_skincare,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_perusahaan' => $request->id_perusahaan,
            'id_toko' => $request->id_toko
        ]
        );

        return redirect()->route('skincare.index')->with('success', 'Ubah Berhasil');
    }

    public function show($id)
    {
    $data = DB::select('select * from skincares s inner join perusahaans p on s.id_perusahaan = p.id_perusahaan inner join tokos t on s.id_toko = t.id_toko WHERE id_skincare = :id',['id' => $id])[0];
        return view('skincare.show', [
            'data' => $data,
        ]);
    }

    public function softDelete($id)
    {
        DB::update('UPDATE skincares SET deleted_at = ? where id_skincare = ?',[
            now(),
            $id
        ]);

        return redirect('/soft');
    }

    public function restore($id)
    {
        DB::update('UPDATE skincares SET deleted_at = ? where id_skincare = ?',[
            null,
            $id
        ]);

        return redirect('/soft');
    }


    public function hardDelete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM skincares WHERE id_skincare = :id_skincare', ['id_skincare' => $id]);

        return redirect()->route('softDelete')->with('success', 'Hapus Berhasil');
    }

    public function softIndex(){

        $datas = DB::select('select * from skincares b inner join perusahaans g on b.id_perusahaan = g.id_perusahaan inner join tokos s on b.id_toko = s.id_toko where b.deleted_at is NOT NULL');

        return view('soft.index', [
            'datas' => $datas
        ]);
    }

    public function trashed()
    {
        $datas = DB::select('select * from skincares b inner join perusahaans g on b.id_perusahaan = g.id_perusahaan inner join tokos s on b.id_toko = s.id_toko where b.deleted_at is NOT NULL');

        return view('soft.index', [
            'datas' => $datas
        ]);
    }

}
