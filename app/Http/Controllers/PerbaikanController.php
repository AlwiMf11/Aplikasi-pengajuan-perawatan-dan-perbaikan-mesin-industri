<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permintaan;
use App\model\Mesin;
use DB;
use Auth;
class PerbaikanController extends Controller
{
    public function index()
    {
        $data = Permintaan::where('type','perbaikan')->where('user_id',Auth::user()->id)->get();
        return view('permintaan.perbaikan.index',compact('data'));
    }
    public function tambah()
    {
        $mesin = Mesin::all();
        return view('permintaan.perbaikan.tambah',compact('mesin'));
    }
    
    public function store(Request $request)
    {
        $cek = DB::table('permintaan')->get();
        $count = count($cek);
        if($count <= 0)
        {
            $digit = '0001';
        }
        else
        {
            $n2 = str_pad($count + 1, 4, 0, STR_PAD_LEFT);
        }
        $digit = str_pad($count + 1, 4, 0, STR_PAD_LEFT);
        $kd = 'permintaan-'.$digit;
        $data = DB::table('permintaan')->insert([
            'kd'=>$kd,
            'user_id'=>Auth::user()->id,
            'mesin_id'=>$request->mesin_id,
            'judul'=>$request->judul,
            'keterangan'=>$request->keterangan,
            'status'=>'open',
            'tgl_permintaan'=>$request->tgl_permintaan,
            'type'=>'perbaikan',
        ]);
        if(Auth::user()->level != 'User'){
            return redirect('/permintaan/perbaikan')->with('success','Permintaan perbaikan berhasil');
        }else{
            return redirect('/user/permintaan/perbaikan')->with('success','Permintaan perbaikan berhasil');
        }
    }
}
