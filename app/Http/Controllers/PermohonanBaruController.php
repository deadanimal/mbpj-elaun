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
        // $tarikhPermohonan = $permohonan->created_at->format('d-m-Y');

        $senaraiKakitangan = array();

        foreach ($permohonan->users as $user) {
            if ($user->permohonan_with_users->is_rejected_individually != 1) {
                array_push($senaraiKakitangan, $user);
            }
        }

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                    'tarikh_permohonan' => $tarikhPermohonan,
                    'arrayKelulusan' => $this->getKelulusanWithData($permohonan),
                    'senaraiKakitangan' =>$senaraiKakitangan
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
                $permohonan->users()->updateExistingPivot($idUser, array('is_rejected_individually' => 1), false);
            }
        }
    }

    public function retrieveMasaSebenar(Request $request, $id_user)
    {
        $id_permohonan_baru = $request->input('id_permohonan_baru');
        $permohonan = PermohonanBaru::find($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if($user->id == $id_user) {
                $masa_mula_sebenar = $user->permohonan_with_users->masa_mula_sebenar;
                $masa_akhir_sebenar = $user->permohonan_with_users->masa_akhir_sebenar;
            }
        }

        return response()->json([
            'error' => false,
            'masa_mula_sebenar' => $masa_mula_sebenar,
            'masa_akhir_sebenar' => $masa_akhir_sebenar
        ], 200);
    }

    public function kemaskiniModal(Request $request, $id_permohonan_baru)
    {
        $idUser = $request->input('id_user');
        $masa_mula_sebenar = $request->input('masa_mula_sebenar');
        $permohonan = PermohonanBaru::find($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if($user->id == $idUser) {
                $permohonan->users()
                            ->updateExistingPivot($idUser, array(
                                    'masa_mula_sebenar' => $request->input('masa_mula_sebenar'),
                                    'masa_akhir_sebenar' => $request->input('masa_akhir_sebenar')
                                ));
            }
        }
    }
}
