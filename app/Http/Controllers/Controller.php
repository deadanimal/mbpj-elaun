<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Support\Facades\Auth;
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
    }

    public function findPermohonanWithIDKakitangan($jenisPermohonan, $id){
        // $jenisPermohonan = substr($jenisPermohonan,0,2);
        // dd($jenisPermohonan);
        // dd(substr($jenisPermohonan,0,-1));
        // dd(PermohonanBaru::with('users')->where('id',$id)->where('jenis_permohonan_kakitangan','like' ,$jenisPermohonan.'%')->get());
        return $permohonans = User::find($id)->permohonans->where('jenis_permohonan_kakitangan', $jenisPermohonan);
        // return $permohonans = PermohonanBaru::with('users')->where('jenis_permohonan_kakitangan','like' ,$jenisPermohonan.'%')->get();
    }

    public function findAllPermohonanForTypes($jenisPermohonan){
        $is_penyelia = Auth::user()->role_id == '2' ? 1 : 0;
        $is_ketuaJabatan = Auth::user()->role_id == '5' ? 1 : 0;
        $is_ketuaBahagian = Auth::user()->role_id == '4' ? 1 : 0;

        if ($is_penyelia) {
            return $permohonans = PermohonanBaru::with("users")->permohonanPegawaiSokong()->where('jenis_permohonan', 'like', $jenisPermohonan.'%')->get();
        }
        
        if ($is_ketuaJabatan) {
            return $permohonans = PermohonanBaru::with("users")->permohonanPegawaiPelulus()->where('jenis_permohonan', 'like', $jenisPermohonan.'%')->get();
        }

        if ($is_ketuaBahagian) {
            return $permohonans = PermohonanBaru::with("users")->permohonanPegawaiSokongAtauPelulus()->where('jenis_permohonan', 'like', $jenisPermohonan.'%')->get();
        }
    }
}   