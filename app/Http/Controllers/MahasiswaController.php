<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use App\Models\Kelas;

use App\Models\User;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index')->with('mahasiswa',$mahasiswa);
    }

    public function create(){
        
        $mahasiswa = Mahasiswa::All();
        $kelas = Kelas::All();
        return view('mahasiswa.create')->with('kelas',$kelas);
    }

    public function store(Request $request)
    {
            $mhs = Mahasiswa::create([
                'id_kelas' =>  $request->id_kelas,
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mahasiswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,

                
            ]);
            return redirect('/mahasiswa')-> with('status', 'Data Mahasiswa berhasil ditambahkan!');  
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        $mhs = Mahasiswa::where('id_user',$id)->first();
        return view("mahasiswa.edit")
            ->with('user',$user)
            ->with('mhs',$mhs);
    }

    public function update(Request $request, $id){
        $user = User::where('id',$id)->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        $mhs = Mahasiswa::where('id_user',$id)->update([
            'id_user' =>  $user->id,
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mahasiswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);
        

    return redirect('/mahasiswa')-> with('status', 'Data Mahasiswa berhasil diupdate!');
    }
}
