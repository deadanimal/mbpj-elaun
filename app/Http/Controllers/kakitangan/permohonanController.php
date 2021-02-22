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
                'tarikh_permohonan' => $data['tarikh_permohonan'],
                'masa_mula' => $data['masa_mula'],
                'masa_akhir'    => $data['masa_akhir'],
                'tujuan'    => $data['tujuan'],
                'jenis_permohonan_kakitangan'   =>  $data['jenis_permohonan_kakitangan'],
                'masa'  =>  $data['masa'],
                'waktu' =>  $data['waktu'],
                'hari'  =>  $data['hari'],
                'kadar_jam' =>  $data['kadar_jam'],
                'status'    =>  $data['status'],
                'jenis_permohonan'  =>  $data['jenis_permohonan']
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
                    'tarikh_permohonan' => $data['tarikh_permohonan'],
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

   public function findPermohonan(Request $request){

    $id_permohonan_baru = $request->input('id_permohonan_baru');
    $permohonan = PermohonanBaru::find($id_permohonan_baru);

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                ], 200);

   }
}
