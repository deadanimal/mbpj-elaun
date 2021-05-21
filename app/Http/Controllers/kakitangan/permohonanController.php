<?php

namespace App\Http\Controllers\kakitangan;

use App\User;
use DateTime;
use DataTables;
use App\Jobs\PermohonanOT;
use Carbon\Carbon;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\permohonan_with_users;
use App\Services\PermohonanShiftService;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use App\Services\KiraanMasaService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\PermohonanStatusChangedEvent;
use App\DataTables\kakitangan\permohonanDataTable;
use App\Notifications\PermohonanNeedApprovalEmailNotification;

class permohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
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

    public function sendEmailNotificationToPegawaiSokong(PermohonanBaru $permohonan)
    {
        $pegawai_sokong = User::findOrFail($permohonan->id_peg_sokong);
        $pegawai_sokong->notify(new PermohonanNeedApprovalEmailNotification($pegawai_sokong));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /*
         * Codes for Different Shifts 
         * 
         * Condition for > 1 day
         * SS : Siang Start
         * MS : Malam Start
         * ST : Siang Tamat
         * MT : Malam Tamat
         * 
         * Condition for < 1 day
         * SSE : Siang Start End
         * nomalam : No shift malam 
         * MSE : Malam Start End
         * nosiang : No shift siang
         * SSTPE : Siang Start Tamat Pagi Esok
         * LIMITS : Stop Siang after SSTPE
         * MSTME : Malam Start Tamat Malam Esok
         * LIMITM : Stop Malam after SSTME
         * 
         */

        $jenisPermohonan = $request->input('jenisPermohonan');
        $id_user = $request->input('user_id');
        $data = $request->input('object');
        $masaMula = $request->input('masaMula');
        $masaAkhir = $request->input('masaAkhir');
        $pekerja = array($request->input('pekerja'));
        $array = array($data);
        $masa = new PermohonanShiftService($id_user);
        $shiftSebenar = $masa->kiraMasa($masaMula,$masaAkhir);
        $dayCount = $shiftSebenar[0];
        $shiftType = "";

        if($dayCount >= 1){
            if(in_array("ss",$shiftSebenar) && in_array("st",$shiftSebenar)){
                $shiftType = 'ssst';
            }else if(in_array("ss",$shiftSebenar) && in_array("mt",$shiftSebenar)){
                $shiftType = 'ssmt';
            }else if(in_array("ms",$shiftSebenar) && in_array("st",$shiftSebenar)){
                $shiftType = 'msst';
            }else if(in_array("ms",$shiftSebenar) && in_array("mt",$shiftSebenar)){
                $shiftType = 'msmt';
            }else{
                dd('takde pun');
            }        
        }else {

            if("sse" == $shiftSebenar[1] && "nomalam" == $shiftSebenar[2]){
                $shiftType = 'ssenom';
            }else if("mse" == $shiftSebenar[1] && "nosiang" == $shiftSebenar[2]){
                $shiftType = 'msenos';
            }else if("ss" == $shiftSebenar[1] && "m" == $shiftSebenar[2]){
                $shiftType = 'ssm';
            }else if("ms" == $shiftSebenar[1] && "s" == $shiftSebenar[2]){
                $shiftType = 'mss';
            }else if("sstpe" == $shiftSebenar[1] && "limitS" == $shiftSebenar[2]){
                $shiftType = 'sselims';
            }else if("mstme" == $shiftSebenar[1] && "limitM" == $shiftSebenar[2]){
                $shiftType = 'mselimm';
            }

        }
        // dd($shiftType);

        $newPermohonan = $masa->doPermohonanBaru($shiftType,$dayCount,$masaMula,$masaAkhir);

        PermohonanOT::dispatch($masa->createPermohonan($pekerja,$newPermohonan,$data,$jenisPermohonan));
        
            return response()->json(
                [
                    'message' => 'success',
                ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $idUser)
    {
        $pilihan = $request->input('pilihan');

        if(request()->ajax()){
            return datatables()->of($this->findPermohonanWithIDKakitangan($pilihan,$idUser))->make(true); 
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
    public function update(Request $request, $idPermohonanBaru)
    {
        $id_user = $request->input('id_user');
        $jenisPermohonan = $request->input('jenisPermohonan');
        $masa_mula = $request->input('masa_mula');
        $masa_akhir = $request->input('masa_akhir');

        $calculatedMasa = new PermohonanShiftService($id_user);
        
        $validator = Validator::make($request->all(), [ 
            'jenisPermohonan' => 'required',
            'tarikh_permohonan' => 'required',
            'tarikh_akhir_kerja' => 'required',
            'id_peg_pelulus' => 'required',
            'id_peg_sokong' => 'required',
            'masa_mula' => 'required',
            'masa_akhir' => 'required',
            'hari' => 'required',
            'tujuan' => 'required',
            'lokasi' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                dd($message);
            }
            return response()->json([
                
            ],500);
        }

        if($jenisPermohonan == 'OT1'){
            $permohonan = PermohonanBaru::findOrFail($idPermohonanBaru);

            $permohonan->tarikh_mula_kerja = $request->input('tarikh_permohonan');
            $permohonan->tarikh_akhir_kerja = $request->input('tarikh_akhir_kerja');
            $permohonan->masa_mula = $request->input('masa_mula');
            $permohonan->masa_akhir = $request->input('masa_akhir');
            // $permohonan->status = $request->input('status');
            // $permohonan->progres = "Belum sah";
            // $permohonan->masa = $calculatedMasa->kiraMasa($masa_mula,$masa_akhir);
            $permohonan->masa = $this->timeDiff($masa_mula,$masa_akhir);
            // $permohonan->waktu = $request->input('waktu');
            $permohonan->hari = $request->input('hari');
            $permohonan->tujuan = $request->input('tujuan');
            $permohonan->lokasi = $request->input('lokasi');
            $permohonan->id_peg_sokong = $request->input('id_peg_sokong');
            $permohonan->id_peg_pelulus = $request->input('id_peg_pelulus');

            $permohonan->save();
            $permohonan->refresh();

            $this->sendEmailNotificationToPegawaiSokong($permohonan);

            return response()->json([
                'permohonan' => $permohonan->sebab
            ],200);

        } else if($jenisPermohonan == "OT2"){
            $permohonan = PermohonanBaru::findOrFail($idPermohonanBaru);

            $permohonan = $this->findPermohonanUser($idPermohonanBaru);
            $permohonan->tarikh_permohonan = $request->input('tarikh_permohonan');
            $permohonan->masa_mula = $request->input('masa_mula');
            $permohonan->masa_akhir = $request->input('masa_akhir');
            $permohonan->masa = $request->input('masa');
            $permohonan->waktu = $request->input('waktu');
            $permohonan->tujuan = $request->input('tujuan');

            $this->sendEmailNotificationToPegawaiSokong($permohonan);

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
        $timeDiff = $masa_akhir-$masa_mula;

        $timeDiff = floatval($timeDiff/$secInAnHour);

        // return the difference
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
        $permohonan = PermohonanBaru::find($id);
        $permohonan->status_akhir = 0;
        $permohonan->save();
        $permohonan->refresh();

        return response()->json([
            'permohonan' => $permohonan
        ],200);
        
    }

//    public function findPermohonan(Request $request){
   public function findPermohonan(Request $request, $id_permohonan_baru){
    // $id_permohonan_baru = $request->input('id_permohonan_baru');
    $jenis_permohonan = $request->input('jenis_permohonan');
    $currUserID = auth()->user()->CUSTOMERID;

        if($jenis_permohonan == 'OT1'){
            $permohonan = User::findOrFail(auth()->user()->CUSTOMERID)->permohonans->where('id_permohonan_baru',$id_permohonan_baru)->first();
            return response()->json([
                        'error' => false,
                        'permohonan'  => $permohonan,
                    ], 200);
        } else if($jenis_permohonan == "OT2"){
            $permohonanUsers = PermohonanBaru::findOrFail($id_permohonan_baru)->users()->get()->toArray();
            $permohonan = PermohonanBaru::findOrFail($id_permohonan_baru);
            return response()->json([
                        'error' => false,
                        'permohonanUsers' =>  $permohonanUsers,
                        'permohonan'  => $permohonan,
                        'userId' => $currUserID
                    ], 200);
        }

    }

    public function pegawai(Request $request){

        $userID = $request->input('id_user'); 
        $jabatans = $this->findJabatans()->get();
        $pegawaiSokong = $this->findPegawaiSokong()->where('CUSTOMERID','!=',$userID)->orderBy('NAME','asc')->get();
        $pegawaiLulus = $this->findPegawaiLulus()->where('CUSTOMERID','!=',$userID)->orderBy('NAME','asc')->get();
        return response()->json([
            'jabatans' => $jabatans,
            'pegawaiSokong' => $pegawaiSokong,
            'pegawaiLulus' => $pegawaiLulus
        ],200);

    }

    public function getOncall(Request $request){

        $id = $request->input('id_user');
        $user = User::findOrFail($id);
        return response()->json([
            'user' => $user
        ],200);

    }
}
