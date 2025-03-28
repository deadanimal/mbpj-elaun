<?php

namespace App\Http\Controllers\kakitangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use App\PermohonanBaru;
use App\permohonan_with_users;
use Carbon\Carbon;
use DataTables;
use App\DataTables\UsersDataTable;
use App\Events\PermohonanStatusChangedEvent;


class semakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('core.kakitangan.semakan');
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
        $permohonans = User::findOrFail($id)->permohonans()
                            ->whereIn('jenis_permohonan', array('PS1', 'PS2', 'EL1', 'EL2'))
                            ->whereIn('jenis_permohonan_kakitangan', array('OT1', 'OT2', 'PS1', 'PS2'))
                            ->statusAkhirBelomDiterima();

        return datatables()->of($permohonans)->make(true);
    }

    public function showModal(Request $request, $id){
        $pilihanKT = $request->input('pilihanKT');
        $pilihanReal = $request->input('pilihanReal');

        $permohonan = PermohonanBaru::findOrFail($id);
        $peg_sokong = User::with('maklumat_pekerjaan.jawatan')->findOrFail($permohonan->id_peg_sokong);
        $peg_pelulus = User::with('maklumat_pekerjaan.jawatan')->findOrFail($permohonan->id_peg_pelulus);

        foreach ($permohonan->users as $user) {
            $masa_mula_sebenar = $user->permohonan_with_users->masa_mula_sebenar;
            $masa_akhir_sebenar = $user->permohonan_with_users->masa_akhir_sebenar;
        }

        return response()->json([
            'permohonan' => $permohonan,
            'masa_mula_sebenar' => $masa_mula_sebenar,
            'masa_akhir_sebenar' => $masa_akhir_sebenar,
            'peg_sokong' => $peg_sokong,
            'peg_pelulus' => $peg_pelulus,
        ],200);
        
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
        $permohonan = PermohonanBaru::findOrFail($id);
        $masa_mula_sebenar = $request->input('masa_mula_sebenar');
        $masa_akhir_sebenar = $request->input('masa_akhir_sebenar');
        $masa_sebenar = 0;

        $validator = Validator::make($request->all(), [ 
            'tarikh_permohonan' => 'required',
            'tarikh_akhir_kerja' => 'required',
            'masa_mula' => 'required',
            'masa_akhir' => 'required',
            'masa_mula_sebenar' => 'required',
            'masa_akhir_sebenar' => 'required',
            'tujuan' => 'required',
            'lokasi' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                dd($message);
            }
        } else{
            $permohonan->tarikh_mula_kerja = $request->input('tarikh_permohonan');
            $permohonan->tarikh_akhir_kerja = $request->input('tarikh_akhir_kerja');
            $permohonan->masa_mula = $request->input('masa_mula');
            $permohonan->masa_akhir = $request->input('masa_akhir');
            $permohonan->tujuan = $request->input('tujuan');
            $permohonan->lokasi = $request->input('lokasi');

            $masa_sebenar = $this->timeDiff($masa_mula_sebenar, $masa_akhir_sebenar);

            ($permohonan->users)->each(function($user) use ($permohonan, $request, $masa_mula_sebenar,  $masa_akhir_sebenar, $masa_sebenar) {
                $permohonan->users()
                            ->updateExistingPivot($user->CUSTOMERID, array(
                                    'masa_mula_sebenar' => $masa_mula_sebenar,
                                    'masa_akhir_sebenar' =>  $masa_akhir_sebenar,
                                    'masa_sebenar' => $masa_sebenar
                                ), 
                                false);
            });

            event(new PermohonanStatusChangedEvent($permohonan, 0, 1, 0));   

            return response()->json([
                'permohonan' => $permohonan
            ],200);
        }
    }

    function timeDiff($masa_mula, $masa_akhir)
    {
        $secInAnHour = 3600;
        // convert to unix timestamps
        $masa_mula = strtotime($masa_mula);
        $masa_akhir = strtotime($masa_akhir);

        // perform subtraction to get the difference (in seconds) between times
        $timeDiff = $masa_akhir - $masa_mula;

        $timeDiff = floatval($timeDiff/$secInAnHour);

        return $timeDiff;
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
        $permohonan = PermohonanBaru::findOrFail($id);
        $permohonan->is_deleted = 1;
        $permohonan->save();
        $permohonan->refresh();
        return response()->json([
            'permohonan' => $permohonan
        ],200);
        
    }
}
