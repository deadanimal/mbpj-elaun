<?php

namespace App\Http\Controllers\kerani_semakan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use App\DataTables\UsersDataTable;

class keraniSemakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('core.kerani_semakan.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permohonans = PermohonanBaru::with('users')
                            ->where('status_akhir', 1)
                            ->where('kerani_pemeriksa_approved', 1)
                            ->get();

        return datatables()->of($permohonans)->make(true); 

    }
}
