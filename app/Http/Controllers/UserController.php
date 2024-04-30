<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    { 
        $data = new User();  
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif

        if ($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
    }

        if ($request->get('tanggal')) {
            $data = $data->where('tanggal', $request->get('tanggal'));
    }

        $data = $data->with('level')->get();

        return view('users.index', compact('data', 'request', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif           
        return view('users.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator); 

        $photo      = $request->file('photo');
        $filename   = date('Y-m-d') . $photo->getClientOriginalName();
        $path       = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));


        $data['email']      = $request->email;
        $data['name']       = $request->nama;
        $data['username']   = $request->username;
        $data['password']   = Hash::make($request->password);
        $data['image']      = $filename;
        $data['level_id']      = $request->level;

        User::create($data);

        return redirect()->route('admin.index')->with(compact('activeMenu'));
    }

    public function show(Request $request, $id)
    {
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif 

        $data = User::find($id);
        return view('users.show', compact('data', 'activeMenu'));
    }

    public function edit(Request $request, $id)
    {
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif 

        $data = User::find($id);
        return view('users.edit', compact('data', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif 
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'nama'      => 'required',
            'username'  => 'required',
            'password'  => 'nullable',
            'photo'     => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = User::find($id);

        $data['username']   = $request->username;
        $data['name']       = $request->nama;

        if ($request->password) {
            $data['password']   = Hash::make($request->password);
        }

        $photo      = $request->file('photo');

        if ($photo) {

            $filename   = date('Y-m-d') . $photo->getClientOriginalName();
            $path       = 'photo-user/' . $filename;

            if ($find->image) {
                Storage::disk('public')->delete('photo-user/' . $find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($photo));

            $data['image']      = $filename;
        }

        $find->update($data);

        return redirect()->route('admin.index')->with(compact('activeMenu'));
    }

    public function delete(Request  $request, $id)
    {
        $activeMenu = 'users'; // Menandai menu "Users" sebagai aktif 

        $data = User::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('admin.index')->with(compact('activeMenu'));
    }


}
