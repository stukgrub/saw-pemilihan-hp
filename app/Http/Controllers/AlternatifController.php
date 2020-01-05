<?php

namespace App\Http\Controllers;

use App\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        $array = ['arr1', 'arr2', 'arr3'];
        return view('alternatif/index', compact('alternatif', 'array'));
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
        $data = new Alternatif;

        $data->merk_hp = $request->merek;
        $data->thn_hp = $request->tahun;

        $data->save();

        return redirect('/alternatif')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = DB::table('alternatifhp')->where('idhp', $id)->get();
        return view('/alternatif/edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        DB::table('alternatifhp')->where('idhp', $request->id)->update([

            'merk_hp' => $request->merek,
            'thn_hp' => $request->tahun,
        ]);
        return redirect('/alternatif')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('alternatifhp')->where('idhp', $id)->delete();
        return redirect('/alternatif')->with('status', 'Data Berhasil Dihapus');
    }
}
