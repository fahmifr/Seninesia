<?php
namespace App\Http\Controllers;
use App\Models\artikel;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    
    
    public function index()
    {
        return view('index');
    }
}
