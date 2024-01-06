<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelasModel;
use Validator;

class KelasController extends Controller
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
        //menampilkan semua data dari model kelas
        $kelas = KelasModel::all();
        return view('kelas.index')->with('kelas', $kelas);
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = KelasModel::all();
        return view('kelas.create');
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
            'nama_kelas' => 'required',
            'nama_pa' => 'required',
        ]);

        KelasModel::create($request->all());
        return redirect('/kelas');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));

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
        $validated = $request->validate([
            'id' => 'required',
            'nama_kelas' => 'required',
            'nama_pa' => 'required',
        ]);

        $kelas = kelas::findOrFail($id);
        $kelas->id = $request->id;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->nama_pa = $request->nama_pa;
        $kelas->save();
        return redirect()->route('kelas.index')
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
        $kelas = kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}

