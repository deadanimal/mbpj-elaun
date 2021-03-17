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
        
        return view('core.ketua_bahagian.semakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function show(Request $request, $id)
    { 
        $pilihan = $request->input('pilihan');
        $permohonan = $this->findAllPermohonanForTypes($pilihan)->first();
        
        if(strlen($pilihan) == 3){
            return datatables()->of($this->findPermohonanWithID($pilihan, $id))->make(true); 
        } else {
            return datatables()->of($this->findAllPermohonanForTypes($pilihan))->make(true);
        }
    }
}
