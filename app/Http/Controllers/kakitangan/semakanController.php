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
    public function show(Request $request,$id)
    {
        $pilihanKT = $request->input('pilihanKT');
        $pilihanReal = $request->input('pilihanReal');

        if(request()->ajax()){
                
                return datatables()->of($this->findPermohonanWithIDSemakan($pilihanReal,$pilihanKT,$id))->make(true);
            
        }
    }

    public function showModal(Request $request,$id){
        $pilihanKT = $request->input('pilihanKT');
        $pilihanReal = $request->input('pilihanReal');
        // dd($id);
        $permohonan = PermohonanBaru::find($id);
        return response()->json([
            'permohonan' => $permohonan,
            
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
        //
        $permohonan = PermohonanBaru::find($id);
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
        }else{

        $permohonan->tarikh_permohonan = $request->input('object.tarikh_permohonan');
        $permohonan->masa_mula = $request->input('object.masa_mula');
        $permohonan->masa_akhir = $request->input('object.masa_akhir');
        $permohonan->masa = $request->input('object.masa');
        $permohonan->waktu = $request->input('object.waktu');
        $permohonan->tujuan = $request->input('object.tujuan');

        $permohonan->save();
        $permohonan->refresh();
        event(new PermohonanStatusChangedEvent($permohonan, 0, 1));
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
}
