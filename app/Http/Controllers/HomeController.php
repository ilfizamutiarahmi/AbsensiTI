<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\ProdiModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Your controller logic here
    }
    
    public function dashboard(){
        $jml_mhs = Mahasiswa::all()->count();
        $jml_dosen = Dosen::all()->count();
        $jml_prodi = ProdiModel::all()->count();
        $jml_kelas = Kelas::all()->count();

        return view('dashboard')->with('jml_mhs', $jml_mhs)
                                ->with('jml_dosen', $jml_dosen)
                                ->with('jml_prodi', $jml_prodi)
                                ->with('jml_kelas', $jml_kelas);
    }

    public function index(){
        $data = User::get();
        return view ('index', compact('data'));
    }
}
