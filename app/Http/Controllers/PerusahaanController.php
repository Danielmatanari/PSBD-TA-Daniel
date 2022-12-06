<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException; 

class PerusahaanController extends Controller
{
    public function index() {
        $datas = DB::select('select * from perusahaans');

        return view('perusahaan.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('perusahaan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_perusahaan' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'telp_perusahaan' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO perusahaans(id_perusahaan, nama_perusahaan, alamat_perusahaan, telp_perusahaan) VALUES (:id_perusahaan, :nama_perusahaan, :alamat_perusahaan, :telp_perusahaan)',
        [
            'id_perusahaan' => $request->id_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'telp_perusahaan' => $request->telp_perusahaan
        ]
        );

        return redirect()->route('perusahaan.index')->with('success', 'Berhasil Simpan');
    }

    public function edit($id) {
        $data = DB::table('perusahaans')->where('id_perusahaan', $id)->first();

        return view('perusahaan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_perusahaan' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'telp_perusahaan' => 'required'
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE perusahaans SET id_perusahaan = :id_perusahaan, nama_perusahaan = :nama_perusahaan, alamat_perusahaan = :alamat_perusahaan, telp_perusahaan = :telp_perusahaan WHERE id_perusahaan = :id',
        [
            'id' => $id,
            'id_perusahaan' => $request->id_perusahaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'telp_perusahaan' => $request->telp_perusahaan
        ]
        );

        return redirect()->route('perusahaan.index')->with('success', 'Changed Successfully');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM perusahaans WHERE id_perusahaan = :id_perusahaan', ['id_perusahaan' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Hapus Berhasil');
    }

}
