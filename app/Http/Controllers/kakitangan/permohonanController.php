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
            PermohonanBaru::insert([$data]);
            $permohonans = PermohonanBaru::orderBy('id_permohonan_baru','desc')->first(); 

            if ($permohonans->jenis_permohonan == $jenisPermohonan) {
                $users = Auth::user()->id;
                $permohonans->users()->attach($users);
                
            }

            return response()->json(
                [
                    'message' => 'success',
                ],200);

        }else if($jenisPermohonan == 'OT2'){
            $validator = Validator::make($request->input('object'), array(
                
                'id_peg_pelulus' => 'required',
                // 'id_peg_sokong' => 'required' ,
                'tarikh_permohonan' => 'required',
                'masa_mula' => 'required',
                'masa_akhir' => 'required',
                'tujuan' => 'required',
                'lokasi' => 'required',
                
            ));
            if ($validator->fails()) {
                dd('fail');
            }
            // var_dump('ni ot2',$jenisPermohonan,$data['namaPekerja'],$data['sebab']);
            

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
        // dd($id);

        // $permohonan = $this->findPermohonanWithID($pilihan,Auth::user()->id)->first();
        
        if(request()->ajax()){
            return datatables()->of($this->findPermohonanWithID($pilihan,$id))->make(true); 
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
