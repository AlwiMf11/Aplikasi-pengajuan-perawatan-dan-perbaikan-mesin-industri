<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permintaan;
use App\model\Mesin;
use DB;
use Auth;

class PerawatanController extends Controller
{
    public function index()
    {
        $data = Permintaan::where('type','perawatan')->where('user_id',Auth::user()->id)->get();
        return view('permintaan.perawatan.index',compact('data'));
    }
    public function tambah()
    {
        $mesin = Mesin::all();
        return view('permintaan.perawatan.tambah',compact('mesin'));
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
            'type'=>'perawatan',
        ]);
        if(Auth::user()->level != 'User'){
            return redirect('/permintaan/perawatan')->with('success','Permintaan perawatan berhasil');
        }else{
            return redirect('/user/permintaan/perawatan')->with('success','Permintaan perawatan berhasil');
        }
    }
}
