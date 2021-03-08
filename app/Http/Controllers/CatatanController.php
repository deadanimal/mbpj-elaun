<?php

namespace App\Http\Controllers;

use App\Catatan;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\Events\PermohonanStatusChangedEvent;

class CatatanController extends Controller
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

    public function saveCatatan(Request $request, $idPermohananBaru)
    {
        $permohonan = PermohonanBaru::find($idPermohananBaru);
        $catatan = new Catatan([
            'catatan' => $request->input('catatan'),
            'jenis_permohonan' => $request->input('jenis_permohonan'),
            'is_kemaskini' => $request->input('is_kemaskini'),
            'id_user' => auth()->id(),
            'masa' => now()
        ]);

        $permohonan->catatans()->save($catatan);
        
        event(new PermohonanStatusChangedEvent($permohonan, 0, 0, 0));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function show(Catatan $catatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Catatan $catatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catatan $catatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catatan  $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catatan $catatan)
    {
        //
    }
}
