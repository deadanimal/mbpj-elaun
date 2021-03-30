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
use App\DataTables\kakitangan\permohonanDataTable;
use App\Events\PermohonanStatusChangedEvent;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $jenisPermohonan = $request->input('jenisPermohonan');
        $data = $request->input('object');
        // dd($request->input('pekerja'));
        $pekerja = array($request->input('pekerja'));
        $array = array($data);

        if($jenisPermohonan == 'OT1' ){
            $validator = Validator::make($data, array(
                
                'id_peg_pelulus' => 'required',
                'id_peg_sokong' => 'required' ,
                'tarikh_permohonan' => 'required',
                // 'masa_mula' => 'required',
                // 'masa_akhir' => 'required',
                'tujuan' => 'required',
                // 'lokasi' => 'required',
                
            ));
            if ($validator->fails()) {
                dd('fail');
            }
            $permohonanbaru = new PermohonanBaru([
                'id_peg_pelulus'    => $data['id_peg_pelulus'],
                'id_peg_sokong' => $data['id_peg_sokong'],
                'tarikh_mula_kerja' => $data['tarikh_permohonan'],
                'masa_mula' => $data['masa_mula'],
                'masa_akhir'    => $data['masa_akhir'],
                'tujuan'    => $data['tujuan'],
                'jenis_permohonan_kakitangan'   =>  $data['jenis_permohonan_kakitangan'],
                'masa'  =>  $data['masa'],
                'waktu' =>  $data['waktu'],
                'hari'  =>  $data['hari'],
                'kadar_jam' =>  $data['kadar_jam'],
                'status'    =>  $data['status'],
                'jenis_permohonan'  =>  $data['jenis_permohonan'],
                'tarikh_akhir_kerja' => $data['tarikh_akhir_kerja']

            ]);
            // $permohonans = PermohonanBaru::orderBy('id_permohonan_baru','desc')->first(); 
            $permohonanbaru->save();
            $permohonanbaru->refresh();
            $permohonans = PermohonanBaru::orderBy('created_at','desc')->first(); 

            if ($permohonanbaru->jenis_permohonan == $jenisPermohonan) {
                $users = Auth::user()->id;
                $permohonans->users()->attach($users);
                
            }

            return response()->json(
                [
                    'message' => 'success',
                ],200);

        }else if($jenisPermohonan == 'OT2'){
            // dd($request->all());
            $validator = Validator::make($request->all(), [ 
                
                'object.id_peg_pelulus' => 'required',
                // 'id_peg_sokong' => 'required' ,
                'object.tarikh_permohonan' => 'required',
                'object.masa_mula' => 'required',
                'object.masa_akhir' => 'required',
                'object.tujuan' => 'required',
                // 'object.lokasi' => 'required',
                'pekerja.*' => 'required|distinct',
            
            ]);
            if ($validator->fails()) {
                dd('fail',$request->all());
            }else{
                // dd($data);
                $permohonanbaru = new PermohonanBaru([
                    'id_peg_pelulus'    => $data['id_peg_pelulus'],
                    'id_peg_sokong' => $data['id_peg_sokong'],
                    'tarikh_mula_kerja' => $data['tarikh_permohonan'],
                    'masa_mula' => $data['masa_mula'],
                    'masa_akhir'    => $data['masa_akhir'],
                    'tujuan'    => $data['tujuan'],
                    'jenis_permohonan_kakitangan'   =>  $data['jenis_permohonan_kakitangan'],
                    'masa'  =>  $data['masa'],
                    'waktu' =>  $data['waktu'],
                    'hari'  =>  $data['hari'],
                    'kadar_jam' =>  $data['kadar_jam'],
                    'status'    =>  $data['status'],
                    'jenis_permohonan'  =>  $data['jenis_permohonan'],
                    'tarikh_akhir_kerja' => $data['tarikh_akhir_kerja']
                    
                ]);
                // 
                $permohonanbaru->save();
                $permohonanbaru->refresh();
                $permohonans = PermohonanBaru::orderBy('created_at','desc')->first(); 
                // dd($permohonans);
                // dd($permohonanbaru->jenis_permohonan);
                if ($permohonanbaru->jenis_permohonan == $jenisPermohonan) {
                    foreach($pekerja as $pekerjas){
                        // dd($pekerjas);
                        $users = User::find($pekerjas)->pluck('id');
                        // dd($users);
                        // print_r($users);
                        $permohonans->users()->attach($users);
                    }
                    
                    
                }
    
                return response()->json(
                    [
                        'message' => 'success',
                    ],200);
            // dd("lepas validate",$request->input('pekerja'));
            }

        }
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
        // dd(substr($pilihan,0,2));

        // $permohonan = $this->findPermohonanWithID($pilihan,Auth::user()->id)->first();
        
        if(request()->ajax()){
            return datatables()->of($this->findPermohonanWithIDKakitangan($pilihan,$id))->make(true); 
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
        $permohonan->is_deleted = 1;
        $permohonan->save();
        $permohonan->refresh();
        return response()->json([
            'permohonan' => $permohonan
        ],200);
        
    }

   public function findPermohonan(Request $request){

    $id_permohonan_baru = $request->input('id_permohonan_baru');
    $jenis_permohonan = $request->input('jenis_permohonan');
    $currUserID = auth()->user()->id;
        if($jenis_permohonan == 'OT1'){
            $permohonan = User::find(auth()->user()->id)->permohonans->where('id_permohonan_baru',$id_permohonan_baru)->first();
            return response()->json([
                        'error' => false,
                        'permohonan'  => $permohonan,
                    ], 200);

        }
        else if($jenis_permohonan == "OT2"){
            $permohonanUsers = PermohonanBaru::find($id_permohonan_baru)->users()->get()->toArray();
            $permohonan = PermohonanBaru::find($id_permohonan_baru);
            return response()->json([
                        'error' => false,
                        'permohonanUsers' =>  $permohonanUsers,
                        'permohonan'  => $permohonan,
                        'userId' => $currUserID
                    ], 200);

        }

    }

    public function pegawai(){

        $pegawaiSokong = $this->findPegawaiSokong()->get();
        $pegawaiLulus = $this->findPegawaiLulus()->get();
        return response()->json([
            'pegawaiSokong' => $pegawaiSokong,
            'pegawaiLulus' => $pegawaiLulus
        ],200);

    }
}
