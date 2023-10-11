<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permintaan;
use App\model\Mesin;
use DB;
use Auth;
use PDF;
class LaporanPerawatanController extends Controller
{
    public function index()
    {
        $data = Permintaan::where('type','perawatan')->where('status','=','closed')->get();
    return view('laporan.perawatan.index',compact('data'));
    }
    public function print(Request $request)
    {  
        $data = Permintaan::where('type','perawatan')->where('status','closed')->get();
    
        $pdf = PDF::loadview('laporan.perawatan.print',compact('data'));
        return $pdf->stream();
    }
}
