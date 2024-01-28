<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\ProdiModel;
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
        $kelas = Kelas::all();
        $prodi = ProdiModel::all();
        return view('kelas.index',compact('kelas','prodi'));
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $prodi = ProdiModel::all();
        return view('kelas.create')->with('prodi',$prodi);
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

        Kelas::create($request->all());
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
        $kelas = Kelas::findOrFail($id);
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
        $prodi = ProdiModel::get();
        return view('kelas.edit', compact('kelas','prodi'));

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
        //     'nama_kelas' => 'required',
        //     'nama_pa' => 'required',
        // ]);

        $kelas = kelas::findOrFail($id);
        $kelas->id = $request->id;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->nama_pa = $request->nama_pa;
        $kelas->id_prodi = $request->id_prodi;
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
        $kelas = Kelas::where('id',$id)
                ->delete();
        return redirect()->route('kelas.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}

