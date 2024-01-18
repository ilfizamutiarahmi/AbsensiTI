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

    public function create(){
        
        $tahun_ajar = TahunAjar::All();
        return view('tahun_ajar.create');
    }

    public function store(Request $request)
    {
            $mhs = TahunAjar::create([
                'tahun_ajar' =>  $request->tahun_ajar,
                'semester' => $request->semester,
                
            ]);
            return redirect('/tahun_ajar')-> with('status', 'Data Tahun Ajar berhasil ditambahkan!');  
    }
}
