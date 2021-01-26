<?php

namespace App\Http\Controllers\penyelia;

use DataTables;
use App\User;
use App\PermohonanBaru;
use App\permohonan_with_users;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
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
        if(request()->ajax()) {
            return datatables()->of(User::select("*"))
            ->make(true);
        }
        
        return view('core.penyelia.semakan');
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
     * 
     * OT1 == 00
     * EL1 == 01
     * OT2 == 10
     * EL2 == 11
     * 
     */
    public function show(Request $request, $id)
    { 
        $pilihan = $request->input('pilihan');
        $permohonanBaru = array();

        switch ($pilihan) {
            case '00':
                return datatables()->of(permohonan_with_users::where('jenis_permohonan', 'OT1')
                                    ->having('users_id','=', $id)
                                    ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                                    ->get())
                                    ->make(true); 
                break;
            case '01':
                return datatables()->of(permohonan_with_users::where('jenis_permohonan', 'EL1')
                                    ->having('users_id','=', $id)
                                    ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                                    ->get())
                                    ->make(true); 
                break;
            case '10':
                $permohonans = permohonan_with_users::where('jenis_permohonan', 'OT2')
                                    ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                                    ->get();

                foreach ($permohonans as $key=>$permohonan) {
                    $users = $permohonan->users_id;

                    $usersExploded = explode(",", $users);
                    $dataPermohonan = PermohonanBaru::where('id_permohonan_baru', $permohonan->id_permohonan_baru)->first();

                    if (in_array($id, $usersExploded)) {
                        $permohonanBaru[$key] = $dataPermohonan;
                    }
                }
                return datatables()->of($permohonanBaru)->make(true);
                break;
            case '11':
                $permohonans = permohonan_with_users::where('jenis_permohonan', 'EL2')
                                    ->join('permohonan_barus', 'permohonan_with_users.id_permohonan_baru', '=', 'permohonan_barus.id_permohonan_baru')
                                    ->get();

                foreach ($permohonans as $key=>$permohonan) {
                    $users = $permohonan->users_id;

                    $usersExploded = explode(",", $users);
                    $dataPermohonan = PermohonanBaru::where('id_permohonan_baru', $permohonan->id_permohonan_baru)->first();

                    if (in_array($id, $usersExploded)) {
                        $permohonanBaru[$key] = $dataPermohonan;
                    }
                }
                return datatables()->of($permohonanBaru)->make(true);
                break;
            
            default:
                return 1;
                break;
        }
    }

    public function findUser($id)
    {
        $users = User::find($id);

        return response()->json([
                    'error' => false,
                    'users'  => $users,
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
}
