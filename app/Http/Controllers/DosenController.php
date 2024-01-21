<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;
use App\Models\USer;

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
                
            ]);
            
            $dosen = Dosen::create([
                'id_user' =>  $user->id,
                'nip' => $request->nip,
                'nama_dosen' => $request->nama_dosen,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,

                
            ]);
            return redirect('/dosen')-> with('status', 'Data Dosen berhasil ditambahkan!');  
    }

    public function destroy($id)
    {
        $prodi = Dosen::where('id',$id)
                ->delete();
        return redirect()->route('dosen.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
