<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Periode;
use DB;

class PeriodeController extends Controller
{
    public function index()
    {
        $data = Periode::all();
        return view('periode.index',compact('data'));
    }
    public function edit($id)
    {
        $data = Periode::where('id',$id)->first();
        return view('periode.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'tahun'=> ['required','unique:periode,tahun,'.$request->id],
        ]);
        $data = Periode::where('id',$request->id)->update([
            'tahun'=>$request->tahun,
        ]);
        return redirect('/periode')->with('success','Data Periode berhasil diubah');
    }
    public function tambah()
    {
        return view('periode.tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'unique:periode',
        ]);
        $data = DB::table('periode')->insert([
            'tahun'=>$request->tahun,
        ]);
        return redirect('/periode')->with('success','Data Periode berhasil diubah');
    }
    public function delete($id)
    {
        $cek = DB::table('mesin')->where('periode_id',$id)->count();
        if($cek > 0 )
        {
            return redirect('/periode')->with('fail','Periode tidak dapat dihapus. Karena terdapat Periode yang bersangkutan dengan Data Mesin.');
        }
        $data = Periode::where('id',$id)->delete();
        return redirect('/periode')->with('success','Data Periode berhasil dihapus');
    }
}
