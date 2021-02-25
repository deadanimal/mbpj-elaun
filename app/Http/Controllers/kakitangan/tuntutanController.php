<?php

namespace App\Http\Controllers\kakitangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\PermohonanBaru;
use App\permohonan_with_users;
use Carbon\Carbon;
use DataTables;
use App\Events\PermohonanStatusChangedEvent;

class tuntutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        if(request()->ajax()) {
            return datatables()->of($this->findPermohonanWithIDSemakan($pilihanReal,$pilihanKT,$id))->make(true);
        }
        
        return view('core.kakitangan.tuntutan')->with('user',$user);
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
     */
    public function show($id)
    {
        //
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
        $permohonan = PermohonanBaru::find($id);
        event(new PermohonanStatusChangedEvent($permohonan, 0, 1));
        return response()->json([
            'permohonan' => $permohonan
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $permohonan = PermohonanBaru::find($id);
        $permohonan->is_deleted = 1;
        $permohonan->save();
        $permohonan->refresh();
        return response()->json([
            'permohonan' => $permohonan
        ],200);
        
    }
}
