<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username'=> 'unique:users',
            'email'=> 'unique:users'
        ]);
        DB::table('users')->insert([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'password_asli'=>$request->password,
            'level'=>'User',
        ]);
        return redirect('/login')->with('success','Daftar berhasil');
    }
}
