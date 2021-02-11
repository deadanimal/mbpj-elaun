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

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                    'arrayKelulusan' => $this->getKelulusanWithData($permohonan),
                    'senaraiKakitangan' => $permohonan->users
                ], 200);
    }

    public function getKelulusanWithData($permohonan)
    {
        $arrayKelulusan = [];

        $pegSokong = User::find($permohonan->id_peg_sokong); 
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $pegSokong, 'Pegawai Sokong');

        $pegPelulus = User::find($permohonan->id_peg_pelulus);
        $arrayKelulusan = Arr::prepend($pegPelulus, $pegPelulus, 'Pegawai Pelulus');

        return $arrayKelulusan;
    }

    public function approvedKelulusan($idPermohonanBaru)
    {
        $permohonan = PermohonanBaru::find($idPermohonanBaru);

        event(new PermohonanStatusChangedEvent($permohonan, 1, 0));
    }
}
