<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria/index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kriteria;

        $data->nama_kriteria = $request->nama;
        $data->attribut = $request->jenis;

        $data->save();

        return redirect('/kriteria')->with('status', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = DB::table('kriteria')->where('id_kriteria', $id)->get();
        $attribut = ['Cost', 'Benefit'];
        return view('/kriteria/edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        DB::table('kriteria')->where('id_kriteria', $request->id)->update([

            'nama_kriteria' => $request->nama,
            'attribut' => $request->attribut,
        ]);
        return redirect('/kriteria')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kriteria')->where('id_kriteria', $id)->delete();
        return redirect('/kriteria')->with('status', 'Data Berhasil Dihapus');
    }
}
