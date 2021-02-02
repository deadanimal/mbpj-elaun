<?php

namespace App\Http\Controllers;

use App\eKedatangan;
use Illuminate\Http\Request;

class EKedatanganController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  \App\eKedatangan  $eKedatangan
     * @return \Illuminate\Http\Response
     */
    public function show(eKedatangan $eKedatangan)
    {
        //
    }

    public function findEkedatangan($id_user)
    {
        $ekedatangans = eKedatangan::where('id_user', $id_user)
                                    ->join('users', 'users.id', '=', 'e_kedatangans.id_user')
                                    ->first();
        
        $user_name = $ekedatangans->name;

        return response()->json([
                    'error' => false,
                    'ekedatangans'  => $ekedatangans,
                    'user_name' => $user_name
                ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eKedatangan  $eKedatangan
     * @return \Illuminate\Http\Response
     */
    public function edit(eKedatangan $eKedatangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eKedatangan  $eKedatangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eKedatangan $eKedatangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eKedatangan  $eKedatangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(eKedatangan $eKedatangan)
    {
        //
    }
}
