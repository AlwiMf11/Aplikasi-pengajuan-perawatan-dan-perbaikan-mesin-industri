<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Mesin;
use App\model\Divisi;
use DB;

class MesinController extends Controller
{
    
    public function index()
    {
        $data = Mesin::all();
        return view('mesin.index',compact('data'));
    }
    public function edit($id)
    {
        $divisi = Divisi::all();
        $data = Mesin::where('id',$id)->first();
        $tahun = DB::table('tahun')->get();
        $periode = DB::table('periode')->get();
        return view('mesin.edit',compact('data','divisi','periode','tahun'));
    }
    public function update(Request $request)
    {
        $data = Mesin::where('id',$request->id)->update([
            'nama'=>$request->nama,
            'merk'=>$request->merk,
            'kapasitas'=>$request->kapasitas,
            'divisi_id'=>$request->divisi_id,
            'tahun_id'=>$request->tahun_id,
            'periode_id'=>$request->periode_id,
        ]);
        return redirect('/mesin')->with('success','Data Mesin berhasil diubah');
    }
    public function tambah()
    {
        $divisi = Divisi::all();
        $tahun = DB::table('tahun')->get();
        $periode = DB::table('periode')->get();
        return view('mesin.tambah',compact('divisi','periode','tahun'));
    }
    public function store(Request $request)
    {
        $cek = Mesin::all();
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
        $kd = 'mesin-'.$digit;
        $data = DB::table('mesin')->insert([
            'kd'=>$kd,
            'nama'=>$request->nama,
            'merk'=>$request->merk,
            'kapasitas'=>$request->kapasitas,
            'divisi_id'=>$request->divisi_id,
            'periode_id'=>$request->periode_id,
            'tahun_id'=>$request->tahun_id,
            'active'=>'1'
        ]);
        return redirect('/mesin')->with('success','Data Mesin berhasil diubah');
    }
    public function delete($id)
    {
        $data = Mesin::where('id',$id)->delete();
        return redirect('/mesin')->with('success','Data Mesin berhasil dihapus');
    }
}
