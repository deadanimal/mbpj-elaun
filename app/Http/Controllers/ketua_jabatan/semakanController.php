<?php

namespace App\Http\Controllers\ketua_jabatan;

use App\User;
use DataTables;
use App\eKedatangan;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\permohonan_with_users;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        
        return view('core.ketua_jabatan.semakan');
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
     * This function is used to display all permohonans related to 1 pekerja 
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

                    // if ($usersExploded->contains($id)) {
                    if (in_array($id, $usersExploded)){
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

                    // if ($usersExploded->contains($id)) {
                    if (in_array($id, $usersExploded)){
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

    public function findPermohonan($idPermohananBaru)
    {
        $permohonan = PermohonanBaru::where('id_permohonan_baru', $idPermohananBaru)->first();

        $permohonanBerkumpulan = permohonan_with_users::where('id_permohonan_baru', $idPermohananBaru)->first();

        $users = $permohonanBerkumpulan->users_id;
        $usersExploded = explode(",", $users);

        $penyelia = User::find($permohonan->id_penyelia);
        $ketuaBahagian = User::find($permohonan->id_ketua_bahagian);
        $ketuaJabatan = User::find($permohonan->id_ketua_jabatan);
        $keraniPemeriksa = User::find($permohonan->id_kerani_pemeriksa);
        $keraniSemakan = User::find($permohonan->id_kerani_semakan);

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                    'penyelia' => $penyelia,
                    'ketuaBahagian' => $ketuaBahagian,
                    'ketuaJabatan' => $ketuaJabatan,
                    'keraniPemeriksa' => $keraniPemeriksa,
                    'keraniSemakan' => $keraniSemakan,
                    'senaraiKakitangan' => $usersExploded
                ], 200);
    }

    public function findEkedatangan($id_user)
    {
        $ekedatangans = eKedatangan::where('id_user', $id_user)
                                    ->join('users', 'users.id', '=', 'e_kedatangans.id_user')
                                    ->first();
        
        $user_name = $ekedatangans->name;

        return response()->json([
                    'error' => false,
                    'ekedatangans'  => $ekedatangans,
                    'user_name' => $user_name
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
    
    public function updateKelulusan($idPermohonanBaru)
    {
        $idAuthenticatedUser = Auth::id();
        $user = Auth::user();
        $role = $user->role_id;
        $permohonan = PermohonanBaru::find($idPermohonanBaru);

        switch ($role) {
            case '2':
                $permohonan->id_penyelia = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '4':
                $permohonan->id_ketua_bahagian = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '5':
                $permohonan->id_ketua_jabatan = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '6':
                $permohonan->id_kerani_semakan = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '7':
                $permohonan->id_kerani_pemeriksa = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            default:
                break;
        }
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
