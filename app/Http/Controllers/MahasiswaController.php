<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
            $data = [
                'id_kelas' =>  $request->id_kelas,
                'nim' => $request->nim,
                'nama_mhs' => $request->nama_mahasiswa,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ];
            DB::table('mahasiswa')->insert($data);
            return redirect('/mahasiswa')-> with('status', 'Data Mahasiswa berhasil ditambahkan!');  
    }

    public function edit($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $kelas = Kelas::get();
        return view('mahasiswa.edit', compact('mahasiswa','kelas'));
    }

    public function update(Request $request, $id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->id_kelas = $request->id_kelas;
        $mahasiswa->save();

    return redirect('/mahasiswa')-> with('status', 'Data Mahasiswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::where('id',$id)
                ->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
