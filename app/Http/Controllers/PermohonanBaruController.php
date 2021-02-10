<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\permohonan_with_users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function updateKelulusan($idPermohonanBaru)
    {
        $idAuthenticatedUser = Auth::id();
        $roleAuthUser = Auth::user();
        $permohonan = PermohonanBaru::find($idPermohonanBaru);


        // switch (Auth::user()->role_id) {
        //     case '2':
        //         $permohonan->id_penyelia = $idAuthenticatedUser;
        //         $permohonan->save();
        //         return 1; 
        //         break;
        //     case '4':
        //         $permohonan->id_ketuaBahagian = $idAuthenticatedUser;
        //         $permohonan->save();
        //         return 1; 
        //         break;
        //     case '5':
        //         $permohonan->id_ketuaJabatan = $idAuthenticatedUser;
        //         $permohonan->save();
        //         return 1; 
        //         break;
        //     case '6':
        //         $permohonan->id_keraniSemakan = $idAuthenticatedUser;
        //         $permohonan->save();
        //         return 1; 
        //         break;
        //     case '7':
        //         $permohonan->id_keraniPemeriksa = $idAuthenticatedUser;
        //         $permohonan->save();
        //         return 1; 
        //         break;
        //     default:
        //         break;
        // }
    }
}
