<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;
use App\Models\User;

class DosenController extends Controller
{
    public function index(){
        $dosen = Dosen::all();
        return view('dosen.index')->with('dosen',$dosen);
    }

    public function create(){

        $dosen = Dosen::select('username','nip','nama_dosen','jenis_kelamin','email','alamat','no_hp')
                                ->join('users','dosen.id_user','users.id')
                                ->get();
        return view('dosen.create');
    }

    public function store(Request $request)
    {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            $dosen = Dosen::create([
                'id_user' =>  $user->id,
                'nip' => $request->nip,
                'nama_dosen' => $request->nama_dosen,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,


            ]);
            return redirect('dosen')-> with('status', 'Data Dosen berhasil ditambahkan!');
    }

    public function edit($id){
        $dosen = Dosen::findOrFail($id);
        $user = User::get();
        return view('dosen.edit', compact('dosen','user'));
    }

    public function update(Request $request, $id){
        $dosen = Dosen::findOrFail($id);
        $dosen->nip = $request->nip;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->alamat = $request->alamat;
        $dosen->no_hp = $request->no_hp;
        $dosen->save();

    return redirect('/dosen')-> with('status', 'Data Dosen berhasil diupdate!');
    }

    public function destroy($id)
    {
        $prodi = Dosen::where('id',$id)
                ->delete();
        return redirect()->route('dosen.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function dosen(){
        return view('dashboard');
    }
}
