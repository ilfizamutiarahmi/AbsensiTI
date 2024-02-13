<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\DetailAbsensi;
use Auth;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString();
        $absen = DetailAbsensi::select('detail_absensi.id_absensi','dosen.id_user','absensi.id_jadwal', 'detail_absensi.id_mhs', 'mahasiswa.nama_mhs', 'mahasiswa.nim', 
                                    'detail_absensi.status', 'detail_absensi.keterangan')
                                    ->join('absensi', 'detail_absensi.id_absensi', '=', 'absensi.id')
                                    ->join('mahasiswa', 'detail_absensi.id_mhs', '=', 'mahasiswa.id')
                                    ->join('jadwal', 'absensi.id_jadwal', '=', 'jadwal.id')
                                    ->join('matakuliah', 'jadwal.id_matkul', '=', 'matakuliah.id')
                                    ->join('dosen', 'matakuliah.id_dosen', '=', 'dosen.id')
                                    ->where('dosen.id_user', Auth::User()->id)
                                    ->whereRaw('? BETWEEN jadwal.jam_mulai AND jadwal.jam_akhir', [$now])
                                    ->get();

        return view('absensi.index')->with('absen',$absen)
                                    ->with('hari_ini',$now);
    }

    public function create(Request $request){
        $filterkelas = $request->id_kelas;
        $now = Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString();
        $mhs = Mahasiswa::select('mahasiswa.id','nim','nama_mhs','mahasiswa.id_kelas','jenis_kelamin','no_telp')
                                ->join('kelas','mahasiswa.id_kelas','=','kelas.id')
                                ->where('mahasiswa.id_kelas','=', $filterkelas)
                                ->get();
        $jadwal = Jadwal::select('jadwal.id','id_tahunajar','jadwal.jam_mulai','jadwal.jam_akhir','matakuliah.nama_matkul','jadwal.id_kelas','kelas.nama_kelas')
                                ->join('kelas','jadwal.id_kelas','=','kelas.id')
                                ->join('matakuliah','jadwal.id_matkul','=','matakuliah.id')
                                ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                                ->join('dosen','matakuliah.id_dosen','=','dosen.id')
                                ->join('users','dosen.id_user','=','users.id')
                                ->where('dosen.id_user', '=', Auth::User()->id)
                                ->whereRaw('? BETWEEN jadwal.jam_mulai AND jadwal.jam_akhir', $now)
                                ->get();
        $status = ['Hadir','Sakit','Izin','Alfa'];

        return view('absensi.create')->with('jadwal',$jadwal)
                    ->with('mhs',$mhs)
                    ->with('statuses',$status)
                    ->with('hari_ini',$now);
    }

    public function store(Request $request)
    {
        $now = Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString();
        $jadwal = Jadwal::select('jadwal.id','jadwal.id_tahunajar','jadwal.jam_mulai','jadwal.jam_akhir','matakuliah.nama_matkul','jadwal.id_kelas','kelas.nama_kelas')
                        ->join('kelas','jadwal.id_kelas','=','kelas.id')
                        ->join('matakuliah','jadwal.id_matkul','=','matakuliah.id')
                        ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                        ->join('dosen','matakuliah.id_dosen','=','dosen.id')
                        ->join('users','dosen.id_user','=','users.id')
                        ->whereRaw('? BETWEEN jadwal.jam_mulai AND jadwal.jam_akhir', [$now])
                        ->where('dosen.id_user', '=', Auth::User()->id)
                        ->first();

        $absensi = Absensi::create([
                'id_jadwal' => $jadwal->id,
                'tanggal' => $request->hari_ini
            ]);
            
            for($i=0;$i<count($request->id_mhs);$i++){
                $keterangan = $request->keterangan[$i] ? $request->keterangan[$i] : 'hadir';
                DetailAbsensi::create([
                    'id_absensi' =>  $absensi->id,
                    'id_mhs' =>  $request->id_mhs[$i],
                    'status' => $request->status[$i],
                    'keterangan' => $keterangan,
                ]);
            }
            return redirect('/absensi')-> with('status', 'Daftar hadir berhasil ditambahkan berhasil ditambahkan!');
    }
}
