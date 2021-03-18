<?php

namespace App\Http\Controllers;

use App\User;
use App\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
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
}
