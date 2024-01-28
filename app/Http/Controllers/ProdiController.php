<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProdiModel;
use Validator;

class ProdiController extends Controller
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
        $prodi = ProdiModel::all();
        return view('prodi.index')->with('prodi', $prodi);
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = ProdiModel::all();
        return view('prodi.create');
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
            'nama_prodi' => 'required',
            'kaprodi' => 'required',
        ]);

        ProdiModel::create($request->all());
        return redirect('/prodi');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodi = prodi::findOrFail($id);
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = ProdiModel::findOrFail($id);
        return view('prodi.edit', compact('prodi'));

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
        //     'nama_prodi' => 'required',
        //     'kaprodi' => 'required',
        // ]);

        $prodi = ProdiModel::findOrFail($id);
        $prodi->id = $request->id;
        $prodi->nama_prodi = $request->input('nama_prodi');
        $prodi->kaprodi = $request->input('kaprodi');
        $prodi->save();
        return redirect()->route('prodi.index')
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
        $prodi = ProdiModel::where('id',$id)
                ->delete();
        return redirect()->route('prodi.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}

