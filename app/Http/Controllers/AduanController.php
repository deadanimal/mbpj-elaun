<?php

namespace App\Http\Controllers;

use App\User;
use App\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // public function saveAduan(Request $request)
    // {
        
    // }

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
        $aduan = new Aduan([
            'tajukAduan' => $request->input('tajukAduan'),
            'keteranganAduan' => $request->input('keteranganAduan')
        ]);

        $aduan->user()->associate(Auth::id());
        $aduan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function show(Aduan $aduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Aduan $aduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aduan $aduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aduan $aduan)
    {
        //
    }
}
