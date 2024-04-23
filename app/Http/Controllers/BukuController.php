<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{

    public function index(Request $request)
    {
        $data = new  Buku(); 
        if ($request->get('search')) {
            $data = $data->where('judul', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('kategori_buku', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('kode_buku', 'LIKE', '%' . $request->get('search') . '%');
        }
        
        $data = $data->get();
        return view('buku.index', compact('data', 'request'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_buku' => 'required',
            'sampul' => 'image|mimes:jpeg,png,jpg|max:10000',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()-> withInput() ->withErrors($validator);

        $find = Buku::find($id);
        $data['kode_buku']  = $request->kode_buku;
        $data['judul']      = $request->judul;
        $data['kategori_buku']   = $request->kategori_buku;
        $data['penerbit']   = $request->penerbit;
        $data['penulis']   = $request->penulis;
        $data['tahun_terbit']   = $request->tahun_terbit;
        $sampul      = $request->file('sampul');

        if ($sampul) {

            $filename   = date('Y-m-d') . $sampul->getClientOriginalName();
            $path       = 'sampul-buku/' . $filename;

            if  ($find->sampul) {
                Storage::disk('public')->delete('sampul-buku/' . $find->sampul);
            }

            Storage::disk('public')->put($path, file_get_contents($sampul));

            $data['sampul']      = $filename;
        }

        $find->update($data);

        return redirect()->route('buku.index');
    
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_buku' => 'required',
            'sampul' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'judul' => 'required',
            'kategori_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()-> withInput() ->withErrors($validator);

        $sampul = $request->file('sampul');
        $filename = date('Y-m-d') . $sampul->getClientOriginalName();
        $path = 'sampul-buku/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($sampul));

        $data['kode_buku'] = $request->kode_buku;
        $data['sampul'] = $filename;
        $data['judul'] = $request->judul;
        $data['kategori_buku'] = $request->kategori_buku;
        $data['penulis'] = $request->penulis;
        $data['penerbit'] = $request->penerbit;
        $data['tahun_terbit'] = $request->tahun_terbit;

        Buku::create($data);

        return redirect()->route('buku.index');

    }

    public function show(Request $request, $buku_id)
    {
        $data = Buku::where(['buku_id' => $buku_id])->first();
        return view('buku.show', compact('data'));
    }

    public function edit(string $buku_id)
    {
        $data = Buku::where(['buku_id' => $buku_id])->first();
        return view('buku.edit', compact('data'));
    }

    public function delete(string $buku_id)
    {
        $data = Buku::findOrFail($buku_id);
        if($data){
            $data->delete();
        }
        return redirect()->route('buku.index');
    }
}
