<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permintaan;
use App\model\Mesin;
use DB;
use Auth;

class TransaksiPerbaikanController extends Controller
{
    public function index()
    {
        $data = Permintaan::where('type','perbaikan')->where('status','=','closed')->get();
        return view('transaksi.perbaikan.index',compact('data'));
    }
    public function edit($id)
    {
        $mesin = Mesin::all();
        $data = Permintaan::where('id',$id)->first();
        return view('transaksi.perbaikan.edit',compact('data','mesin'));
    }
    public function delete($id)
    {
        $data = Permintaan::where('id',$id)->delete();
        return redirect('/transaksi/perbaikan')->with('success','Data berhasil dihapus');
    }
    public function ubah(Request $request)
    {
        $data = DB::table('permintaan')->where('id', $request->id)->update([
            'mesin_id'=>$request->mesin_id,
            'judul'=>$request->judul,
            'keterangan'=>$request->keterangan,
            'tgl_permintaan'=>$request->tgl_permintaan,
        ]);
            return redirect('/transaksi/perbaikan')->with('success','Data berhasil diubah');
    }
}
