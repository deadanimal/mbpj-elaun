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
        // $shiftKerja = array($shiftSebenar);
        // print_r($dayCount);
        if($dayCount >= 1){
            // dd('sahkdas');
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

            // dd($shiftType);
        }else {
            // dd($shiftSebenar);
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
        //
        $pilihan = $request->input('pilihan');
        // dd($pilihan);
        // dd(substr($pilihan,0,2));

        // $permohonan = $this->findPermohonanWithID($pilihan,Auth::user()->id)->first();
        if(request()->ajax()){
            // dd($this->findPermohonanWithIDKakitangan($pilihan,$idUser));
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
        //

        $reject = array($request->input('reject'));
        // dd($reject);
        $jenisPermohonan = $request->input('jenisPermohonan');
        
        $validator = Validator::make($request->all(), [ 
                
            'object.tarikh_permohonan' => 'required',
            'object.masa_mula' => 'required',
            'object.masa_akhir' => 'required',
            'object.masa'   => 'required',
            'object.waktu'  => 'required',
            'object.tujuan' => 'required',

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
            $permohonan = $this->findPermohonanWithIDKakitangan($jenisPermohonan,$idPermohonanBaru);
            // dd($permohonan);
            $permohonan->tarikh_mula_kerja = $request->input('object.tarikh_permohonan');
            $permohonan->masa_mula = $request->input('object.masa_mula');
            $permohonan->masa_akhir = $request->input('object.masa_akhir');
            $permohonan->status = $request->input('object.status');
            $permohonan->progres = "Belum sah";
            $permohonan->masa = $request->input('object.masa');
            $permohonan->waktu = $request->input('object.waktu');
            $permohonan->tujuan = $request->input('object.tujuan');

            $permohonan->save();
            $permohonan->refresh();

            $this->sendEmailNotificationToPegawaiSokong($permohonan);

            return response()->json([
                'permohonan' => $permohonan
            ],200);
        }
        else if($jenisPermohonan == "OT2"){
            foreach($reject as $rejected){
                // dd($rejected);
                // dd($idPermohonanBaru);
            $permohonan = $this->findPermohonanForReject($rejected,$idPermohonanBaru)->first();
            // $permohonans = $this->findPermohonanUser($rejected,$idPermohonanBaru);
                // dd($permohonan);

                // dd($permohonan);
                event(new PermohonanStatusChangedEvent($permohonan, 0, 0, 1));
            }
            $permohonan = $this->findPermohonanUser($idPermohonanBaru);
            $permohonan->tarikh_permohonan = $request->input('object.tarikh_permohonan');
            $permohonan->masa_mula = $request->input('object.masa_mula');
            $permohonan->masa_akhir = $request->input('object.masa_akhir');
            $permohonan->status = $request->input('object.status');
            $permohonan->progres = "Belum sah";
            $permohonan->masa = $request->input('object.masa');
            $permohonan->waktu = $request->input('object.waktu');
            $permohonan->tujuan = $request->input('object.tujuan');

            $permohonan->save();
            $permohonan->refresh();

            $this->sendEmailNotificationToPegawaiSokong($permohonan);

            return response()->json([
                'permohonan' => $permohonan
            ],200);
        }
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

   public function findPermohonan(Request $request){
    $id_permohonan_baru = $request->input('id_permohonan_baru');
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
