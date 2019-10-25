<?php

namespace App\Http\Controllers;
use App\Models\artikel;
use Auth;
use App\User;
use Illuminate\Http\Request;

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
        if(Auth::User()->level=='1'){
        $seni = artikel::all();
        return view('seni.index', compact('seni'));
        }
        return view('home');
    }
}
