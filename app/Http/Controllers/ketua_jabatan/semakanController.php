<?php

namespace App\Http\Controllers\ketua_jabatan;

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
        
        return view('core.ketua_jabatan.semakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function show(Request $request, $id)
    { 
        $pilihan = $request->input('pilihan');
        $minDate = $request->input('minDate');
        $maxDate = $request->input('maxDate');

        if (strlen($pilihan) == 3){
            if ($minDate && !$maxDate) {
                return datatables()->of($this->findPermohonanWithIDMin($pilihan, $id, $minDate))->make(true);
            }
    
            if (!$minDate && $maxDate) {
                return datatables()->of($this->findPermohonanWithIDMax($pilihan, $id, $maxDate))->make(true);
            }
    
            if ($minDate && $maxDate) {
                return datatables()->of($this->findPermohonanWithIDBetween($pilihan, $id, $minDate, $maxDate))->make(true); 
            }

            if (!$minDate && !$maxDate) {
                return datatables()->of($this->findPermohonanWithID($pilihan, $id))->make(true); 
            }
        } 

        return datatables()->of($this->findAllPermohonanForTypes($pilihan))->make(true);
    }
}
