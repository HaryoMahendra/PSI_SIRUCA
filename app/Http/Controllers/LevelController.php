<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        $activeMenu = 'level'; // Menu yang Anda ingin tandai sebagai aktif
        
        $data = new  Level(); 
        if ($request->get('search')) {
            $data = $data->where('level_nama', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('level_kode', 'LIKE', '%' . $request->get('search') . '%');
        }
    
        $data = $data->get();
        // Menentukan menu aktif
        $activeMenu = 'level'; // Menu yang Anda ingin tandai sebagai aktif
    
        return view('level.index', compact('data', 'request', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'level';           
        return view('level.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_level' => 'required|string|min:3|unique:level,level_kode',
            'nama_level' => 'required|string|max:100'
        ]);

        Level::create([
            'level_kode' => $request->kode_level,
            'level_nama' => $request->nama_level
        ]);

        return redirect()->route('level.index')->with('success', 'Data level berhasil ditambahkan');
    }

    public function show(Request $request, $id)
    {
        $activeMenu = 'level'; 

        $data = Level::find($id);
        return view('level.show', compact('data', 'activeMenu'));
    }

    public function edit(Request $request, $id)
    {
        $activeMenu = 'level'; 

        $data = Level::findOrFail($id); // Menggunakan findOrFail untuk menangani kasus jika data tidak ditemukan
        return view('level.edit', compact('data', 'activeMenu'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3',
            'level_nama' => 'required|string|max:100'
        ]);

        Level::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function delete(Request $request, $id)
    {
        $activeMenu = 'level'; 

        $data = Level::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('level.index')->with(compact('activeMenu'));
    }



}