<?php

namespace App\Http\Controllers;

use App\Hasil;
use App\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bobot = Hasil::all();
        $alternatif = Alternatif::all();
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
        return view('hasil/index', compact('bobot', 'alternatif', 'carimin', 'carimax'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }
}
