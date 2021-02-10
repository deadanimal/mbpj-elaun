<?php

namespace App\Http\Controllers\kakitangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
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
    public function index(Request $request)
    {

        // $timeFormat = User::select("created_at");

        // $user = User::select("*");

        // if(request()->ajax()) {
        //     return datatables()->of($user)
        // ->editColumn('created_at', function ($user) {
        //     return $user->created_at ? with(new Carbon($user->created_at))->format('d/m/Y') : '';;
        // })
        // ->filterColumn('created_at', function ($query, $keyword) {
        //     $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
        // })
        // ->make(true);
        // }


            

        
        return view('core.kakitangan.permohonanbaru');
    
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
    public function show(Request $request, $id)
    {
        //
        $pilihan = $request->input('pilihan');
        // dd($pilihan);

        // $permohonan = $this->findPermohonanWithID($pilihan,Auth::user()->id)->first();
        
        if(request()->ajax()){
            return datatables()->of($this->findPermohonanWithID($pilihan,$id)->where('perkembangan','dalam_proses'))->make(true); 
        }
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

    public function getFormattedTime(){

        
        
    }

    public function getPermohonanBerkumpulan(permohonanDataTable $permohonanDataTable){
        return $permohonanDataTable->render('core.kakitangan.permohonanbaru');
    }
}
