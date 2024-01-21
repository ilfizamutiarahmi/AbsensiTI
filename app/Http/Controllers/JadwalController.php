<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $jadwal = Jadwal::select('nama_kelas','nama_matkul','tahun_ajar','nama_dosen','semester','ruang','jam_mulai','jam_akhir')
                            ->join('kelas','jadwal.id_kelas','=','kelas.id')
                            ->join('matakuliah','jadwal.id_matkul','=','matakuliah.id')
                            ->join('dosen','matakuliah.id_dosen','=','dosen.id')
                            ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                            ->get();
        return view('jadwal.index')->with('jadwal',$jadwal);
    }
}
