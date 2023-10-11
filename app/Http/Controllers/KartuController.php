<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Permintaan;
use App\model\Mesin;
use DB;
use Auth;
use PDF;

class KartuController extends Controller
{
    public function index()
    {
        $data = Mesin::all();
        return view('kartu.index',compact('data'));
    }
    public function print(Request $request)
    {  
        $data = Permintaan::where('mesin_id',$request->mesin_id)->where('status','closed')->get();
    
        $pdf = PDF::loadview('kartu.print',compact('data'));
        return $pdf->stream();
    }
}
