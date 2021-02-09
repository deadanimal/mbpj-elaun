<?php

namespace App\Http\Controllers\ketua_bahagian;

use App\User;
use DataTables;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\permohonan_with_users; 
use App\Http\Controllers\Controller;

class semakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(User::select("*"))
            ->make(true);
        }
        
        return view('core.ketua_bahagian.semakan');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * OT1 == 00
     * EL1 == 01
     * OT2 == 10
     * EL2 == 11
     * PS1 == 02
     * PS2 == 12
     * 
     * This function is used to display all permohonans related to 1 pekerja 
     * 
     */
    public function show(Request $request, $id)
    { 
        $pilihan = $request->input('pilihan');
        
        return datatables()->of($this->findPermohonanWithID($pilihan, $id))->make(true); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
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
        //    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
