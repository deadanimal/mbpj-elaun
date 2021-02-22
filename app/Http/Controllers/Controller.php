<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function findPermohonanWithID($jenisPermohonan, $id){
        return $permohonans = User::find($id)->permohonans()->where('jenis_permohonan', $jenisPermohonan)
                                                           ->isNotDeleted();                                     

    }

    public function findPermohonanWithIDKakitangan($jenisPermohonan, $id){
        return $permohonans = User::find($id)->permohonans->where('jenis_permohonan_kakitangan', $jenisPermohonan);
    }

    public function findAllPermohonanForTypes($jenisPermohonan){

        switch (Auth::user()->role_id) {
            case '2':
                return $permohonans = PermohonanBaru::with("users")->permohonanPegawaiSokong()
                                                               ->where('jenis_permohonan', 'like', $jenisPermohonan.'%')
                                                               ->get();
                break;
            case '4':
                return $permohonans = PermohonanBaru::with("users")->permohonanPegawaiSokongAtauPelulus()
                                                                   ->where('jenis_permohonan', 'like', $jenisPermohonan.'%')
                                                                   ->get();
                break;
            case '5':
                return $permohonans = PermohonanBaru::with("users")->permohonanPegawaiPelulus()
                                                                   ->where('jenis_permohonan', 'like', $jenisPermohonan.'%')
                                                                   ->get();
                break;
            
            default:
                return 404;
                break;
        }
    }
}   