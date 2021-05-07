<?php

namespace App\Http\Controllers\pelulus_pindaan_sah;

use App\User;
use DataTables;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function index()
    {   
        return view('core.pelulus_pindaan_sah.dashboard');
    }

    public function show(Request $request, $id)
    {   
        $permohonans = PermohonanBaru::with('users')->get();

        return datatables()->of($permohonans)->make(true);
    }
}
