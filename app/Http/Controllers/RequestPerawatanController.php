<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permintaan;
use App\model\Mesin;
use DB;
use Auth;

class RequestPerawatanController extends Controller
{
    public function index()
    {
        $data = Permintaan::where('type','perawatan')->where('status','!=','closed')->get();
        return view('request.perawatan.index',compact('data'));
    }
    public function update(Request $request)
    {
        $cek = DB::table('permintaan')->where('id',$request->id)->update([
            'status'=>$request->status
        ]);

        return redirect('/permintaan/perawatan')->with('success','Status berhasil diubah');
    }
    public function edit($id)
    {
        $mesin = Mesin::all();
        $data = Permintaan::where('id',$id)->first();
        return view('request.perawatan.edit',compact('data','mesin'));
    }
    public function delete($id)
    {
        $data = Permintaan::where('id',$id)->delete();
        return redirect('/permintaan/perawatan')->with('success','Data berhasil dihapus');
    }
    public function ubah(Request $request)
    {
        $data = DB::table('permintaan')->where('id', $request->id)->update([
            'mesin_id'=>$request->mesin_id,
            'judul'=>$request->judul,
            'keterangan'=>$request->keterangan,
            'tgl_permintaan'=>$request->tgl_permintaan,
        ]);
            return redirect('/permintaan/perawatan')->with('success','Data berhasil diubah');
    }
}
