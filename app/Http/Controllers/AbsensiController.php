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
use Dompdf\Dompdf;
use Dompdf\Options;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $formattedDate = $now->format('Y-m-d');
        $absen = DetailAbsensi::select('id_absensi','id_jadwal','detail_absensi.id_mhs','nama_mhs','nim','detail_absensi.status','detail_absensi.keterangan')
                                ->join('absensi','detail_absensi.id_absensi','=','absensi.id')
                                ->join('jadwal','absensi.id_jadwal','=','jadwal.id')
                                ->join('mahasiswa','detail_absensi.id_mhs','=','mahasiswa.id')
                                ->get();

        return view('absensi.index')->with('absen',$absen)
                                    ->with('hari_ini',$now);
    }

    public function create(Request $request){
        $filterkelas = $request->id_kelas;
        $now = Carbon::now();
        $mhs = Mahasiswa::select('mahasiswa.id','nim','nama_mhs','mahasiswa.id_kelas','jenis_kelamin','no_telp')
                                ->join('kelas','mahasiswa.id_kelas','=','kelas.id')
                                ->where('mahasiswa.id_kelas','=', $filterkelas)
                                ->get();
        $jadwal = Jadwal::select('jadwal.id','id_tahunajar','jam_mulai','jam_akhir','nama_matkul','jadwal.id_kelas','nama_kelas')
                                ->join('kelas','jadwal.id_kelas','=','kelas.id')
                                ->join('matakuliah','jadwal.id_matkul','=','matakuliah.id')
                                ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                                ->get();
        $status = ['Hadir','Sakit','Izin','Alfa'];

        return view('absensi.create')->with('jadwal',$jadwal)
                    ->with('mhs',$mhs)
                    ->with('statuses',$status)
                    ->with('hari_ini',$now);
    }

    public function store(Request $request)
    {
            $request->validate([
                // 'id_mhs' => 'required',
                'keterangan' => 'nullable|string|max:255',
                
            ]);

            $absensi = Absensi::create([
                'id_jadwal' => "7",
                'tanggal' => $request->hari_ini
            ]);
            
            for($i=0;$i<count($request->id_mhs);$i++){
                DetailAbsensi::create([
                    'id_absensi' =>  $absensi->id,
                    'id_mhs' =>  $request->id_mhs[$i],
                    'status' => $request->status[$i],
                    'keterangan' => $request->keterangan,
                ]);
            }

            return redirect('/absensi')-> with('status', 'Daftar hadir berhasil ditambahkan!');
    }

    public function rekapabsensi(Request $request){
        $rekapabsensi = DetailAbsensi::select('id_absensi','id_jadwal','detail_absensi.id_mhs','nama_mhs','nim','detail_absensi.status','detail_absensi.keterangan')
                                ->join('absensi','detail_absensi.id_absensi','=','absensi.id')
                                ->join('jadwal','absensi.id_jadwal','=','jadwal.id')
                                ->join('kelas','jadwal.id_kelas','=','kelas.id')
                                ->join('mahasiswa','detail_absensi.id_mhs','=','mahasiswa.id')
                                ->get();
                                
        $jadwal = Jadwal::select('jadwal.id','id_tahunajar','jam_mulai','jam_akhir','nama_matkul','jadwal.id_kelas','nama_kelas')
                                ->join('kelas','jadwal.id_kelas','=','kelas.id')
                                ->join('matakuliah','jadwal.id_matkul','=','matakuliah.id')
                                ->join('tahun_ajar','jadwal.id_tahunajar','=','tahun_ajar.id')
                                ->get();

        return view('rekapabsensi.index')->with('rekapabsensi',$rekapabsensi)
                                        ->with('jadwal',$jadwal);
    }

    public function generatePDF()
    {

        $jumlahJadwal = Jadwal::count();

        $jadwal = Jadwal::select('jadwal.id', 'id_tahunajar', 'jam_mulai', 'jam_akhir', 'nama_matkul', 'jadwal.id_kelas', 'nama_kelas')
            ->join('kelas', 'jadwal.id_kelas', '=', 'kelas.id')
            ->join('matakuliah', 'jadwal.id_matkul', '=', 'matakuliah.id')
            ->join('tahun_ajar', 'jadwal.id_tahunajar', '=', 'tahun_ajar.id')
            ->get();

        $count = Absensi::select('absensi.id', 'absensi.id_jadwal', 'detail_absensi.id_mhs', 'nama_mhs', 'nim', 'status', 'keterangan')
        ->join('jadwal', 'absensi.id_jadwal', '=', 'jadwal.id')
        ->join('detail_absensi', 'absensi.id', '=', 'detail_absensi.id_absensi')
        ->join('mahasiswa', 'detail_absensi.id_mhs', '=', 'mahasiswa.id')
        ->join('kelas', 'jadwal.id_kelas', '=', 'kelas.id')
        ->whereIn('absensi.id_jadwal', function($query) {
            $query->select('id')->from('jadwal');
        })
        ->get();

        $count->transform(function ($item) {
            $item->status = json_decode($item->status, true);
            return $item;
        });

        $absensiArray = $count->map(function ($item) {
            return $item->toArray();
        });

        //  dd($count);
        // foreach ($count as $item) {
        //     echo "Status: " . $item->status . "<br>";
        // }

        $rekapabsensi = DetailAbsensi::select('id_absensi', 'id_jadwal', 'detail_absensi.id_mhs', 'nama_mhs', 'nim', 'status', 'keterangan')
            ->join('absensi', 'detail_absensi.id_absensi', '=', 'absensi.id')
            ->join('jadwal', 'absensi.id_jadwal', '=', 'jadwal.id')
            ->join('kelas', 'jadwal.id_kelas', '=', 'kelas.id')
            ->join('mahasiswa', 'detail_absensi.id_mhs', '=', 'mahasiswa.id')
            ->get();

        $pdfContent = view('rekapabsensi.pdf')->with('rekapabsensi', $rekapabsensi)
                                            ->with('count', $count)
                                            ->with('jadwal', $jadwal)
                                            ->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($pdfContent);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $pdfFileName = 'rekapitulasiabsensi' . date('Ymd_His') . '.pdf';
        return $pdf->stream($pdfFileName);
    }
    
}
