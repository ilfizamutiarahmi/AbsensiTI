<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TahunAjar;

class TahunAjarController extends Controller
{
    public function index(){
        $th_ajar = TahunAjar::all();
        return view('tahun_ajar.index')->with('th_ajar',$th_ajar);
    }
}
