<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function findPermohonanWithID($jenisPermohonan, $id){

        return $permohonans = User::find($id)->permohonans->where('jenis_permohonan', $jenisPermohonan);

        // ----- Just another (bad) way to do this ------
        // $user_permohonans = User::find($id)->permohonans;        
        // $permohonans = $user_permohonans->filter(function($user_permohonan) use ($jenisPermohonan){
        //     return $user_permohonan->jenis_permohonan == $jenisPermohonan ?? $user_permohonan;
        // });
        // return $permohonans;
    }

    public function findAllPermohonanForTypes($jenisPermohonan){
        return $permohonans = PermohonanBaru::with("users")->where('jenis_permohonan', 'like', $jenisPermohonan.'%')->get();
    }
}
