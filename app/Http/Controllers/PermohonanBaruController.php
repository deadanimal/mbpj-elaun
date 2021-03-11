<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\permohonan_with_users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\PermohonanStatusChangedEvent;

class PermohonanBaruController extends Controller
{
    public function findPermohonan($idPermohananBaru)
    {
        $permohonan = PermohonanBaru::with('users')->find($idPermohananBaru);
        $tarikhPermohonan = $permohonan->created_at->format('Y-m-d');

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                    'tarikh_permohonan' => $tarikhPermohonan,
                    'arrayKelulusan' => $this->getKelulusanWithData($permohonan),
                    'senaraiKakitangan' => $permohonan->users
                ], 200);
    }

    public function getKelulusanWithData($permohonan)
    {
        $arrayKelulusan = array();

        $pegSokong = User::find($permohonan->id_peg_sokong); 
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $pegSokong, 'peg_sokong');

        $pegPelulus = User::find($permohonan->id_peg_pelulus);
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $pegPelulus, 'peg_pelulus');
        
        return $arrayKelulusan;
    }

    public function approvedKelulusan($idPermohonanBaru)
    {
        $permohonan = PermohonanBaru::find($idPermohonanBaru);

        event(new PermohonanStatusChangedEvent($permohonan, 1, 0, 0));
    }

    public function rejectIndividually(Request $request, $id_permohonan_baru)
    {
        $idUser = $request->input('id_user');
        $permohonan = PermohonanBaru::find($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if($user->id == $idUser) {
                $permohonan->users()->updateExistingPivot($user, array('is_rejected_individually' => 1), false);
            }
        }
    }
}
