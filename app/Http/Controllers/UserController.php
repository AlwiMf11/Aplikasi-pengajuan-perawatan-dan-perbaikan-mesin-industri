<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Divisi;
use DB;
class UserController extends Controller
{
    
    public function index()
    {
        $data = User::where('level','User')->where('active','1')->get();
        return view('user.index',compact('data'));
    }
    public function edit($id)
    {
        $divisi = Divisi::all();
        $data = User::where('id',$id)->first();
        return view('user.edit',compact('data','divisi'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'username'=> ['required','unique:users,username,'.$request->id],
        ]);
        $data = User::where('id',$request->id)->update([
            'username'=>$request->username,
            'nama'=>$request->nama,
            'divisi_id'=>$request->divisi_id,
        ]);
        return redirect('/user')->with('success','Data User berhasil diubah');
    }
    public function tambah()
    {
        $divisi = Divisi::all();
        return view('user.tambah',compact('divisi'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'unique:users',
        ]);
        $cek = User::where('level','User')->get();
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
        $kd = 'user-'.$digit;
        $data = DB::table('users')->insert([
            'kd'=>$kd,
            'username'=>$request->username,
            'nama'=>$request->nama,
            'password'=>bcrypt($request->password),
            'password_asli'=>$request->password,
            'divisi_id'=>$request->divisi_id,
            'level'=>'User',
            'active'=>'1'
        ]);
        return redirect('/user')->with('success','Data User berhasil diubah');
    }
    public function delete($id)
    {
        $data = User::where('id',$id)->delete();
        return redirect('/user')->with('success','Data User berhasil dihapus');
    }
}
