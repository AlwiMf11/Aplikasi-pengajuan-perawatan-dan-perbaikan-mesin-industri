<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Divisi;
use DB;

class DivisiController extends Controller
{
    public function index()
    {
        $data = Divisi::all();
        return view('divisi.index',compact('data'));
    }
    public function edit($id)
    {
        $data = Divisi::where('id',$id)->first();
        return view('divisi.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama'=> ['required','unique:divisi,nama,'.$request->id],
        ]);
        $data = Divisi::where('id',$request->id)->update([
            'nama'=>$request->nama,
        ]);
        return redirect('/divisi')->with('success','Data Divisi berhasil diubah');
    }
    public function tambah()
    {
        return view('divisi.tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'unique:divisi',
        ]);
        $data = DB::table('divisi')->insert([
            'nama'=>$request->nama,
        ]);
        return redirect('/divisi')->with('success','Data Divisi berhasil diubah');
    }
    public function delete($id)
    {
        $cek = DB::table('mesin')->where('divisi_id',$id)->count();
        if($cek > 0 )
        {
            return redirect('/divisi')->with('fail','Divisi tidak dapat dihapus. Karena terdapat divisi yang bersangkutan dengan Data Mesin.');
        }
        $data = Divisi::where('id',$id)->delete();
        return redirect('/divisi')->with('success','Data Divisi berhasil dihapus');
    }
}
