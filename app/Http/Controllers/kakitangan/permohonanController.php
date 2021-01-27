<?php

namespace App\Http\Controllers\kakitangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\DataTables\UsersDataTable;
use App\DataTables\kakitangan\permohonanDataTable;

class permohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $User = User::orderBy('id','asc')->get();
        
        return view('core.kakitangan.permohonanbaru')->with('Users',$User);
    
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
        $user = User::find($id);

        return response()->json([
            'error' => false,
            'title'  => $user,
        ], 200);
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

    public function getPermohonanIndividu(UsersDataTable $UsersDataTable){
        return $UsersDataTable->render('core.kakitangan.permohonanbaru');
    }

    public function getPermohonanBerkumpulan(permohonanDataTable $permohonanDataTable){
        return $permohonanDataTable->render('core.kakitangan.permohonanbaru');
    }
}
