<?php

namespace App\Http\Controllers\kakitangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\DataTables\UsersDataTable;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('core.kakitangan.dashboard');
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
    public function show(Request $request,$id)
    {
       
        $pilihan = $request->input('pilihan');
        switch($pilihan){
            case "permohonan":
                return datatables($this->findPermohonanUser($id)->whereIn('jenis_permohonan_kakitangan',['OT1','OT2'])->get())->make(true);
                break;

            case 'tuntutan':
                return datatables($this->findPermohonanUser($id)->whereIn('jenis_permohonan_kakitangan',['EL1','EL2'])->get())->make(true);
                break;
            
            case 'lulus':
                return datatables($this->findPermohonanUser($id)->where('status_akhir','1')->get())->make(true);
                break;

            case 'tolak':
                return datatables($this->findPermohonanUser($id)->where('status_akhir','0')->get())->make(true);
                break;

            default:
                return datatables($this->findPermohonanUser($id)->get())->make(true);
                break;
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
}
