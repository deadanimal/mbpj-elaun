<?php

namespace App\Http\Controllers\pelulus_pindaan_sah;

use App\User;
use DataTables;
use Carbon\Carbon;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function index()
    {
        // $user = User::select("*");

        // if(request()->ajax()) {
        //     return datatables()->of($user)
        //                 ->editColumn('created_at', function ($user) {
        //                     return $user->created_at ? with(new Carbon($user->created_at))->format('d/m/Y') : '';;
        //                 })
        //                 ->filterColumn('created_at', function ($query, $keyword) {
        //                     $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
        //                 })
        //                 ->make(true);
        // }

        $permohonans = PermohonanBaru::all();

        if (request()->ajax()) {
            return datatables()->of($permohonans)->make(true);
        }
        
        return view('core.pelulus_pindaan_sah.dashboard');
    }

    public function getCustomFilterData(Request $request)
    {
        $users = DB::table('users')->select('*');

        return Datatables::of($users)
            ->filter(function ($query) use ($request) {
                if ($request->has('created_at')) {
                    $query->where('created_at', 'like', "%{$request->get('created_at')}%");
                }

            })
            ->make(true);
    }

    public function show(Request $request, $id)
    {   
        $permohonans = PermohonanBaru::all();

        return datatables()->of($permohonans)->make(true);
    }
}
