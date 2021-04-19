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
    public function show(Request $request,$idUser)
    {
        $pilihan = $request->input('pilihan');
        $permohonan = $this->findPermohonanUser($idUser);

        if ($permohonan->count() > 0) {
            switch($pilihan){
                case "permohonan":
                    // dd($permohonan->whereIn('jenis_permohonan_kakitangan',['OT1','OT2']));
                    return datatables($permohonan->whereIn('jenis_permohonan_kakitangan',['OT1','OT2']))->make(true);
                    break;
                case 'tuntutan':
                    return datatables($this->findPermohonanUser($idUser)->whereIn('jenis_permohonan_kakitangan',['EL1','EL2']))->make(true);
                    break;
                case 'lulus':
                    return datatables($this->findPermohonanUser($idUser)->where('status_akhir','1'))->make(true);
                    break;
                case 'tolak':
                    return datatables($this->findPermohonanUser($idUser)->where('status_akhir','0'))->make(true);
                    break;
                default:
                    return datatables($this->findPermohonanUser($idUser))->make(true);
                    break;
            }
        } else {
            return datatables(array())->make(true);
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
