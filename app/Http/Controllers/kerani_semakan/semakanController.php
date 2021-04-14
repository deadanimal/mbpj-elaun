<?php

namespace App\Http\Controllers\kerani_semakan;

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
        
        return view('core.kerani_semakan.semakan');
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
        $permohonans = PermohonanBaru::with('users')
                            ->where('status_akhir', 1)
                            ->where('kerani_pemeriksa_approved', 1)
                            ->get();

        return datatables()->of($permohonans)->make(true);
    }
}
