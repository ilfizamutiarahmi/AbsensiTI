<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index')->with('mahasiswa',$mahasiswa);
    }

    public function create(){
        
        $mahasiswa = Mahasiswa::select('name','nim','nama_mhs','jenis_kelamin','email','alamat','no_telp')
                                ->join('users','mahasiswa.id_user','users.id')
                                ->get();
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                
            ]);
            
            $mhs = Mahasiswa::create([
                'id_user' =>  $user->id,
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mahasiswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,

                
            ]);
            return redirect('/dosen')-> with('status', 'Data Dosen berhasil ditambahkan!');  
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
