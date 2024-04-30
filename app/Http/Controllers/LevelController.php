<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // DB::insert('insert into level(level_kode, level_nama, created_at) values(?,?,?)', ['STF', 'Staff', now()]);
        // return 'Data level berhasil ditambah';

        $data = DB::select('select * from level'); //mengambil data dari database melalui query builder
        return view('level.index', ['data' => $data]); //mengirim data ke view
    }
}
