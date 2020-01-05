<?php

namespace App\Http\Controllers;

use App\Subkriteria;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sub = Subkriteria::all();
        $sub = DB::table('subkriteria')
            ->join('kriteria', 'subkriteria.id_kriteria', '=', 'kriteria.id_kriteria')
            ->select('kriteria.*','subkriteria.*' )
            ->get();
        $kriteria = Kriteria::all();
        $keterangan = ['Sangat Baik', 'Baik', 'Cukup', 'Kurang'];
        return view('sub/index', compact('sub', 'keterangan', 'kriteria'));
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
        $data = new Subkriteria;
        $data->id_kriteria = $request->id_kriteria;
        $data->nama_sub = $request->nama_sub;
        $data->nilai = $request->nilai;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('/sub')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = DB::table('subkriteria')->where('id_sub', $id)->get();
        $kriteria = Kriteria::all();
        $keterangan = ['Sangat Baik', 'Baik', 'Cukup', 'Kurang'];
        return view('/sub/edit', compact('sub', 'keterangan', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkriteria $subkriteria)
    {
        DB::table('subkriteria')->where('id_sub', $request->id)->update([

            'id_kriteria' => $request->id_kriteria,
            'nama_sub' => $request->nama_sub,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/sub')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subkriteria')->where('id_sub', $id)->delete();
        return redirect('/sub')->with('status', 'Data Berhasil Dihapus');
    }
}
