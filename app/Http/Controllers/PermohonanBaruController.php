<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Support\Arr;
use Illuminate\Http\Request; 
use App\permohonan_with_users;
use App\Services\KiraanElaunService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\PermohonanStatusChangedEvent;
use App\Notifications\PermohonanRejectedEmailNotification;

class PermohonanBaruController extends Controller
{
    public function findPermohonan($idPermohananBaru)
    {
        $senaraiKakitangan = array();
        $permohonan = PermohonanBaru::with('users')->find($idPermohananBaru);
        $tarikhPermohonan = $permohonan->created_at->format('Y-m-d');
        // $tarikhPermohonan = $permohonan->created_at->format('d-m-Y');

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
                    'senaraiKakitangan' => $senaraiKakitangan
                ], 200);
    }

    public function getKelulusanWithData($permohonan)
    {
        $arrayKelulusan = array();
        $pegSokong = User::with('role')->find($permohonan->id_peg_sokong); 
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $pegSokong, 'peg_sokong');
        $pegPelulus = User::with('role')->find($permohonan->id_peg_pelulus);
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $pegPelulus, 'peg_pelulus');
        
        return $arrayKelulusan;
    }

    public function approvedKelulusan($idPermohonanBaru)
    {
        $permohonan = PermohonanBaru::find($idPermohonanBaru);
        
        event(new PermohonanStatusChangedEvent($permohonan, 1, 0, 0));

        $this->saveElaun($permohonan);
    }

    public function saveElaun(PermohonanBaru $permohonan)
    {
        // $jenisPermohonan = array('EL1', 'EL2');
        $jenisPermohonan = array('PS1', 'PS2');
        $sahP1 = $permohonan->progres == 'Sah P1' ? TRUE : FALSE;

        if (in_array($permohonan->jenis_permohonan, $jenisPermohonan) && $sahP1) {
            $tuntutan = ($permohonan->users)->filter(function($user) {
                return $user->permohonan_with_users->is_rejected_individually != 1;
            })->each(function($user) use ($permohonan) {
                $elaun = new KiraanElaunService($permohonan, $user->id);
                $permohonan->users()
                            ->updateExistingPivot($user->id, array('jumlah_tuntutan_elaun' => $elaun->jumlahTuntutanRounded()), false);
            })->map(function ($user) {
                return $user->permohonan_with_users
                            ->jumlah_tuntutan_elaun;
            });
        }
    }

    public function findGajiElaun(Request $request, $id_user)
    {
        $id_permohonan_baru = $request->input('id_permohonan_baru');
        $permohonan = PermohonanBaru::find($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if ($user->id == $id_user){ 
                $jumlah_tuntutan_elaun = $user->permohonan_with_users->jumlah_tuntutan_elaun;
            }
        };

        return response()->json([
            'error' => false,
            'gaji'  => User::find($id_user)->gaji,
            'jumlah_tuntutan_elaun' => $jumlah_tuntutan_elaun
        ], 200);

    }

    public function rejectIndividually(Request $request, $id_permohonan_baru)
    {
        $idUser = $request->input('id_user');
        $permohonan = PermohonanBaru::find($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if($user->id == $idUser) {
                $permohonan->users()->updateExistingPivot($idUser, array('is_rejected_individually' => 1), false);
                $user->notify(new PermohonanRejectedEmailNotification($user));
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
