<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TahunAjar;

class TahunAjarController extends Controller
{
    public function index(){
        $th_ajar = TahunAjar::all();
        return view('tahun_ajar.index')->with('th_ajar',$th_ajar);
    }

    public function create(){
        
        $tahun_ajar = TahunAjar::All();
        return view('tahun_ajar.create');
    }

    public function store(Request $request)
    {
            $th_ajar = TahunAjar::create([
                'tahun_ajar' =>  $request->tahun_ajar,
                'semester' => $request->semester,
                
            ]);
            return redirect('/tahun_ajar')-> with('status', 'Data Tahun Ajar berhasil ditambahkan!');  
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $th_ajar = TahunAjar::findOrFail($id);
        return view('tahun_ajar.edit', compact('th_ajar'));

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

        $th_ajar = TahunAjar::findOrFail($id);
        $th_ajar->id = $request->id;
        $th_ajar->tahun_ajar = $request->input('tahun_ajar');
        $th_ajar->semester = $request->input('semester');
        $th_ajar->save();
        return redirect()->route('tahun_ajar.index')
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
        $th_ajar = TahunAjar::where('id',$id)
                ->delete();
        return redirect()->route('tahun_ajar.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}

