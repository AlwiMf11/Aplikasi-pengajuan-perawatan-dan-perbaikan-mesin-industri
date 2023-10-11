<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->level == 'Admin')
        {
            return redirect('/dashboard/admin');
        }
        else if(Auth::user()->level == 'Teknisi')
        {
            return redirect('/dashboard/teknisi');
        }
        
        else
        {
            return redirect('/dashboard/user');
        }
    }
}
