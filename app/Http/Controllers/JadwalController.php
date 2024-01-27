<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\TahunAjar;
use App\Models\MatakuliahModel;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::select('nama_kelas','nama_matkul','tahun_ajar','nama_dosen','semester','ruang','jam_mulai','jam_akhir')
                            ->join('kelas','jadwal.id_kelas','=','kelas.id')
                            ->join('matakuliah','jadwal.id_matkul','=','matakuliah.id')
                            ->join('dosen','matakuliah.id_dosen','=','dosen.id')
                            ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                            ->get();
        return view('jadwal.index')->with('jadwal',$jadwal);
    }

    public function create()
    {
        $jadwal = Jadwal::all();
        $kelas = Kelas::all();
        $matakuliah = MatakuliahModel::all();
        $th_ajar = TahunAjar::all();
        $hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

        return view('jadwal.create')->with('matakuliah',$matakuliah)
                                    ->with('kelas',$kelas)
                                    ->with('th_ajar',$th_ajar)
                                    ->with('hari',$hari);
                                    
    }

    public function store(Request $request)
    {
        $data = [
            'id_kelas' =>  $request->id_kelas,
            'id_matkul' => $request->id_matkul,
            'id_tahunajar' => $request->id_tahunajar,
            'ruang' => $request->ruang,
            'jam_mulai' => $request->jam_mulai,
            'jam_akhir' => $request->jam_akhir,
            'hari' => $request->hari,

        ];
        DB::table('jadwal')->insert($data);

        return redirect('/jadwal')-> with('status', 'Data Jadwal berhasil ditambahkan!');
    }
}
