<?php

namespace App\Http\Controllers\penyelia;

use App\User;
use DataTables;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class semakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('core.penyelia.semakan');
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
        
        if (strlen($pilihan) == 3){
            return datatables()->of($this->findPermohonanWithID($pilihan, $id))->make(true); 
        } else {
            return datatables()->of($this->findAllPermohonanForTypes($pilihan))->make(true);
        }
    } 
}
