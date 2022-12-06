<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; 

use Illuminate\Http\Request;

class RincianController extends Controller
{
    public function index()
    {
       $datas = DB::select('select * from skincares b inner join perusahaans g on b.id_perusahaan = g.id_perusahaan inner join tokos s on b.id_toko = s.id_toko');
       return view('rincian.index',[
        'datas' => $datas
       ]);
    }
}
