<?php

namespace App\Http\Controllers\penyelia;

use App\User;
use DataTables;
use App\MaklumatPekerjaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class senaraiOnCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('core.penyelia.senaraiOnCall')
                    ->with('jabatan', MaklumatPekerjaan::find(Auth::id())->jabatan->GE_KETERANGAN_JABATAN);
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
        $arrayUsers = array();
        $jabatanAuthUser = MaklumatPekerjaan::find(Auth::id())->HR_JABATAN;
        $users = User::with(['role', 'maklumat_pekerjaan'])->get();

        $usersInJabatan = $users->filter(function ($user) use ($jabatanAuthUser) {
                            $jabatanUser = $user->maklumat_pekerjaan->HR_JABATAN;
                            if ($jabatanUser == $jabatanAuthUser) {
                                return $user;
                            }
                        })->map(function ($user) {
                            // pad zero to the left of CUSTOMERID
                            $user->CUSTOMERID = sprintf('%05d', $user->CUSTOMERID);
                            return $user;
                        });

        return datatables()->of($usersInJabatan->all())->make(true); 
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
