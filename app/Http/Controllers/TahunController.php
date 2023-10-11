<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Tahun;
use DB;
class TahunController extends Controller
{
    
    
    public function index()
    {
        $data = Tahun::all();
        return view('tahun.index',compact('data'));
    }
    public function edit($id)
    {
        $data = Tahun::where('id',$id)->first();
        return view('tahun.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'tahun'=> ['required','unique:tahun,tahun,'.$request->id],
        ]);
        $data = Tahun::where('id',$request->id)->update([
            'tahun'=>$request->tahun,
        ]);
        return redirect('/tahun')->with('success','Data Tahun berhasil diubah');
    }
    public function tambah()
    {
        return view('tahun.tambah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'unique:tahun',
        ]);
        $data = DB::table('tahun')->insert([
            'tahun'=>$request->tahun,
        ]);
        return redirect('/tahun')->with('success','Data Tahun berhasil diubah');
    }
    public function delete($id)
    {
        $cek = DB::table('mesin')->where('tahun_id',$id)->count();
        if($cek > 0 )
        {
            return redirect('/tahun')->with('fail','Tahun tidak dapat dihapus. Karena terdapat Tahun yang bersangkutan dengan Data Mesin.');
        }
        $data = Tahun::where('id',$id)->delete();
        return redirect('/tahun')->with('success','Data Tahun berhasil dihapus');
    }
}
