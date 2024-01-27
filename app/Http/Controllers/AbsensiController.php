<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $jadwal = Jadwal::select('jadwal.id','jadwal.id_dosen','id_tahunajar','jam_mulai','jam_akhir')
                            ->join('kelas','jadwal.id_kelas','=','kelas.id')
                            ->join('dosen','jadwal.id_dosen','=','dosen.id')
                            ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                            ->get();
        $absen = Absensi::all();
        $status = ['Hadir','Sakit','Izin','Alfa'];
        $now = Carbon::now();
        return view('absensi.index')->with('jadwal',$jadwal)
                                    ->with('mhs',$mhs)
                                    ->with('absen',$absen)
                                    ->with('statuses',$status)
                                    ->with('hari_ini',$now);
    }

    public function store(Request $request)
    {
            $request->validate([
                'keterangan' => 'nullable|string|max:255', 
            ]);
            $data = [
                'id_mhs' =>  $request->id_mhs,
                'id_jadwal' => "1",
                'status' => $request->status,
                'keterangan' => $request->keterangan,
                'tanggal' => $request->hari_ini

            ];
            DB::table('absensi')->insert($data);

            return redirect('/mahasiswa')-> with('status', 'Data Mahasiswa berhasil ditambahkan!');  
    }
}
