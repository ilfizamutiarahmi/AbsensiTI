<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Absensi;
use App\Models\Kelas;


class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $mhs = Mahasiswa::select('mahasiswa.id','nim','nama_mhs','mahasiswa.id_kelas','jenis_kelamin','no_telp')
                                ->join('kelas','mahasiswa.id_kelas','=','kelas.id')
                                ->where('mahasiswa.id_kelas','=', '1')
                                ->get();
        $jadwal = Jadwal::all();
        // $absen = Jadwal::select('nim','nama_mhs','jenis_kelamin','no_telp')
        //                     // ->join('jadwal','absensi.id_jadwal','jadwal.id')
        //                     ->join('kelas','mahasiswa.id_kelas','kelas.id')
        //                     ->join('kelas','jadwal.id_kelas','kelas.id')
        //                     ->where('kelas.id','=', 1)
        //                     ->get();
        return view('absensi.index')->with('jadwal',$jadwal)
                                    ->with('mhs',$mhs);
    }

    public function store(Request $request)
    {
            $data = [
                'id_mhs' =>  $request->id_mhs,
                'status' => $request->status,

            ];
            // return $data;
            DB::table('absensi')->insert($data);

            return redirect('/mahasiswa')-> with('status', 'Data Mahasiswa berhasil ditambahkan!');  
    }
}
