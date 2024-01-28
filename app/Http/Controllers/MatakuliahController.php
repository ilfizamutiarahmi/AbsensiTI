<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatakuliahModel;
use App\Models\Dosen;
use Validator;

class MatakuliahController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //menampilkan semua data dari model prodi
        $matakuliah = MatakuliahModel::select('nama_matkul','jml_sks','nama_dosen')
                                ->join('dosen','matakuliah.id_dosen','dosen.id')
                                ->get();
        return view('matakuliah.index')->with('matakuliah', $matakuliah);
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matakuliah = MatakuliahModel::all();
        $dosen = Dosen::all();
        return view('matakuliah.create')->with('dosen',$dosen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_matakuliah' => 'required',
            'jml_sks' => 'required',
        ]);

        MatakuliahModel::create($request->all());
        return redirect('/matakuliah');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matakuliah = MatakuliahModel::findOrFail($id);
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliah = MatakuliahModel::findOrFail($id);
        $dosen = Dosen::get();
        return view('matakuliah.edit', compact('matakuliah','dosen'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi
        // $validated = $request->validate([
        //     'id' => 'required',
        //     'nama_matkul' => 'required',
        //     'jml_sks' => 'required',
        // ]);

        $matakuliah = MatakuliahModel::findOrFail($id);
        $matakuliah->id = $request->id;
        $matakuliah->nama_matkul = $request->nama_matkul;
        $matakuliah->jml_sks = $request->jml_sks;
        $matakuliah->id_dosen = $request->id_dosen;
        $matakuliah->save();
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matakuliah = MatakuliahModel::where('id',$id)
                ->delete();
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}

