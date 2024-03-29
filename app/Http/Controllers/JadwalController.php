<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\TahunAjar;
use App\Models\MatakuliahModel;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::select('jadwal.id','nama_kelas','nama_matkul','tahun_ajar','nama_dosen','semester','ruang','jam_mulai','jam_akhir','hari')
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

    public function edit($id){
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::All();
        $matakuliah = MatakuliahModel::All();
        $tahun_ajar = TahunAjar::All();
        $hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
        return view('jadwal.edit', compact('jadwal','kelas','matakuliah','tahun_ajar','hari'));
    }

    public function update(Request $request, $id){
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->id_kelas = $request->id_kelas;
        $jadwal->id_matkul = $request->id_matkul;
        $jadwal->id_tahunajar = $request->id_tahunajar;
        $jadwal->ruang = $request->ruang;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_akhir = $request->jam_akhir;
        $jadwal->hari = $request->hari;
        $jadwal->save();

    return redirect('/jadwal')-> with('status', 'Data Jadwal
     berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::where('id',$id)
                ->delete();
        return redirect()->route('jadwal.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
