<?php

namespace App\Http\Controllers;

use App\PermohonanBaru;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function findPermohonansAccordingToTargetUser($permohonans, $id)
    {
        foreach ($permohonans as $key=>$permohonan) {
            $users = $permohonan->users_id;

            $usersExploded = explode(",", $users);
            $dataPermohonan = PermohonanBaru::where('id_permohonan_baru', $permohonan->id_permohonan_baru)->first();

            if (in_array($id, $usersExploded)){
                $permohonanBaru[$key] = $dataPermohonan;
            }
        }

        return $permohonanBaru;
    }
}
