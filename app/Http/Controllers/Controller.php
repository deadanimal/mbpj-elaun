<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use App\Jabatan;
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
        return $permohonans = User::findOrFail($id)->permohonans()
                                ->where('jenis_permohonan', $jenisPermohonan)
                                ->statusAkhirBelomDiterima()
                                ->get();

    }

    public function findPermohonanWithIDMin($jenisPermohonan, $id, $minDate){
        return $permohonans = User::findOrFail($id)->permohonans()
                                ->where('jenis_permohonan', $jenisPermohonan)
                                ->where('permohonan_barus.created_at', '>=', $minDate)
                                ->statusAkhirBelomDiterima()
                                ->get();

    }

    public function findPermohonanWithIDMax($jenisPermohonan, $id, $maxDate){
        return $permohonans = User::findOrFail($id)->permohonans()
                                ->where('jenis_permohonan', $jenisPermohonan)
                                ->where('permohonan_barus.created_at', '<=', $maxDate)
                                ->statusAkhirBelomDiterima()
                                ->get();
    }

    public function findPermohonanWithIDBetween($jenisPermohonan, $id, $minDate,  $maxDate){
        return $permohonans = User::findOrFail($id)->permohonans()
                                ->where('jenis_permohonan', $jenisPermohonan)
                                ->whereBetween('permohonan_barus.created_at',[$minDate, $maxDate])
                                ->statusAkhirBelomDiterima()
                                ->get();
    }

    public function findPermohonanWithIDKakitangan($jenisPermohonan, $idUser){
        return User::findOrFail($idUser)->permohonans()
                                ->where('jenis_permohonan_kakitangan', $jenisPermohonan)
                                ->statusAkhirBelomDiterima()
                                ->get();
    }

    public function findPermohonanWithIDSemakan($jenisPermohonan,$jenisPermohonanKT,$id){
        return $permohonans = User::findOrFail($id)->permohonans()
                                ->whereIn('jenis_permohonan',$jenisPermohonan)
                                ->whereIn('jenis_permohonan_kakitangan',$jenisPermohonanKT)
                                ->statusAkhirBelomDiterima();
    }

    public function findAllPermohonan($id){
        return $permohonans = User::findOrFail($id)->permohonans();
    }

    public function findPermohonanUser($idUser){
        return User::findOrFail($idUser)->permohonans;
    }

    public function findPermohonanForReject($id,$idPermohonanBaru){
        return $permohonans = PermohonanBaru::findOrFail($idPermohonanBaru)
                                ->users()
                                ->findOrFail($id);
    }

    public function findPegawaiSokong(){

        return $permohonans = User::select('*')->whereIn('role_id',['2','4']);

    }

    public function findPegawaiLulus(){

        return $permohonans = User::select('*')->whereIn('role_id',['4','5']);

    }

    public function findJabatans(){

        return $permohonans = Jabatan::select('*')->where('GE_KOD_JABATAN','!=','99');

    }

    public function findAllPermohonanForTypes($jenisPermohonan){

        switch (Auth::user()->role_id) {
            case '2':
                return $permohonans = PermohonanBaru::with("users")
                                        ->permohonanPegawaiSokong()
                                        ->where('jenis_permohonan', 'like', $jenisPermohonan.'%')
                                        ->get();
                break;
            case '4':
                return $permohonans = PermohonanBaru::with("users")
                                        ->permohonanPegawaiSokongAtauPelulus()
                                        ->where('jenis_permohonan', 'like', $jenisPermohonan.'%')
                                        ->get();
                break;
            case '5':
                return $permohonans = PermohonanBaru::with("users")
                                        ->permohonanPegawaiPelulus()
                                        ->where('jenis_permohonan', 'like', $jenisPermohonan.'%')
                                        ->get();
                break;
            default:
                return 404;
                break;
        }
    }
}   