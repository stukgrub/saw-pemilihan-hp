<?php

namespace App\Http\Controllers;

use App\Normal;
use App\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NormalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bobot = DB::table('bobot')
            ->join('alternatifhp', 'bobot.idhp', '=', 'alternatifhp.idhp')
            ->select('bobot.*','alternatifhp.*' )
            ->get();
        $normal = DB::table('normal')
            ->join('alternatifhp', 'normal.idhp', '=', 'alternatifhp.idhp')
            ->select('normal.*','alternatifhp.*' )
            ->get();
        $alternatif = Alternatif::all();
        $processors = ['octacore', 'quadcore', 'dualcore'];
        $carimax = DB::table('bobot')
        ->select(DB::raw('
        max(bobot_harga) as max1, 
        max(bobot_ram) as max2, 
        max(bobot_memory) as max3, 
        max(bobot_processor) as max4,
        max(bobot_camera) as max5 
        '))
        ->get();
        $carimin = DB::table('bobot')
        ->select(DB::raw('
        min(bobot_harga) as min1, 
        min(bobot_ram) as min2, 
        min(bobot_memory) as min3, 
        min(bobot_processor) as min4,
        min(bobot_camera) as min5 
        '))
        ->get();

        
        return view('normal/index', compact('normal', 'alternatif', 'processors', 'carimax', 'carimin', 'bobot'));
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
        $data = new Normal;
        $data->idhp = $request->idhp;
        $data->harga = $request->harga;
        $data->ram = $request->ram;
        $data->memory = $request->memory;
        $data->processor = $request->processor;
        $data->camera = $request->camera;

        $data->save();

        return redirect('/normal')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Normal  $normal
     * @return \Illuminate\Http\Response
     */
    public function show(Normal $normal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Normal  $normal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $normal = DB::table('normal')->where('id_normal', $id)->get();
        $alternatif = Alternatif::all();
        $processors = ['octacore', 'quadcore', 'dualcore'];
        $bobot_procie = [5,3,1];

        return view('/normal/edit', compact('normal', 'alternatif', 'processors', 'bobot_procie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Normal  $normal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Normal $normal)
    {
        DB::table('normal')->where('id_normal', $request->id)->update([

            'idhp' => $request->idhp,
            'harga' => $request->harga,
            'ram' => $request->ram,
            'memory' => $request->memory,
            'processor' => $request->processor,
            'camera' => $request->camera,
        ]);
        return redirect('/normal')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Normal  $normal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('normal')->where('id_normal', $id)->delete();
        return redirect('/normal')->with('status', 'Data Berhasil Dihapus');

    }
}
