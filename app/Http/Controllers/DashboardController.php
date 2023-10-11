<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class DashboardController extends Controller
{
    public function admin()
    {
        $users = DB::table('users')->where('level','User')->get();
        $admin = DB::table('users')->where('level','Admin')->get();
        $teknisi = DB::table('users')->where('level','Teknisi')->get();
        $mesin = DB::table('mesin')->get();
        $divisi = DB::table('divisi')->get();
        $transaksi = DB::table('permintaan')->where('status','closed')->get();
        $perbaikan = DB::table('permintaan')->where('status','closed')->where('type','perbaikan')->get();
        $perawatan = DB::table('permintaan')->where('status','closed')->where('type','perawatan')->get();
        return view('dashboard.admin.index',compact('users','admin','teknisi','mesin','divisi','transaksi','perbaikan','perawatan'));
    }
    public function user()
    {
        $transaksi = DB::table('permintaan')->where('user_id',Auth::user()->id)->where('status','closed')->get();
        $perbaikan = DB::table('permintaan')->where('user_id',Auth::user()->id)->where('status','closed')->where('type','perbaikan')->get();
        $perawatan = DB::table('permintaan')->where('user_id',Auth::user()->id)->where('status','closed')->where('type','perawatan')->get();
        return view('dashboard.user.index',compact('transaksi','perbaikan','perawatan'));
    }
    public function teknisi()
    {
        $users = DB::table('users')->where('level','User')->get();
        $admin = DB::table('users')->where('level','Admin')->get();
        $teknisi = DB::table('users')->where('level','Teknisi')->get();
        $mesin = DB::table('mesin')->get();
        $divisi = DB::table('divisi')->get();
        $transaksi = DB::table('permintaan')->where('status','closed')->get();
        $perbaikan = DB::table('permintaan')->where('status','closed')->where('type','perbaikan')->get();
        $perawatan = DB::table('permintaan')->where('status','closed')->where('type','perawatan')->get();
        return view('dashboard.teknisi.index',compact('users','admin','teknisi','mesin','divisi','transaksi','perbaikan','perawatan'));
    }
    
}

