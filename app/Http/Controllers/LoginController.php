<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request -> username,
            'password' => $request -> password
        ];

        if (Auth::attempt($data)) {
            return redirect() -> route('admin.dashboard');
        } else {
            return redirect() -> route('login') -> with('Error', 'Username atau Password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect() -> route('login')->with('Success', 'Berhasil Logout!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'level_id' => ['required'],
            'name' => ['required'],
            'username'=>['required','unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|min:6',
        ]);

        $data['level_id']   = $request->level_id;
        $data['name']       = $request->name;
        $data['username']   = $request->username;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        DB::commit();
        $login = [
            'username'  => $request->username,
            'password'  => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('login');
        } else {
            return redirect()->route('login')->with('failed', 'username atau Password Salah');
        }
    }
}