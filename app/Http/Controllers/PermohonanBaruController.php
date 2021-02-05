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

        $penyelia = User::find($permohonan->id_penyelia); 
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $penyelia, 'penyelia');

        $ketuaBahagian = User::find($permohonan->id_ketuaBahagian);
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $ketuaBahagian, 'ketuaBahagian');

        $ketuaJabatan = User::find($permohonan->id_ketuaJabatan);
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $ketuaJabatan, 'ketuaJabatan');

        $keraniPemeriksa = User::find($permohonan->id_keraniPemeriksa);
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $keraniPemeriksa, 'keraniPemeriksa');

        $keraniSemakan = User::find($permohonan->id_keraniSemakan);
        $arrayKelulusan = Arr::prepend($arrayKelulusan, $keraniSemakan, 'keraniSemakan');

        return $arrayKelulusan;
    }

    public function updateKelulusan($idPermohonanBaru)
    {
        $idAuthenticatedUser = Auth::id();
        $permohonan = PermohonanBaru::find($idPermohonanBaru);

        switch (Auth::user()->role_id) {
            case '2':
                $permohonan->id_penyelia = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '4':
                $permohonan->id_ketuaBahagian = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '5':
                $permohonan->id_ketuaJabatan = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '6':
                $permohonan->id_keraniSemakan = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            case '7':
                $permohonan->id_keraniPemeriksa = $idAuthenticatedUser;
                $permohonan->save();
                return 1; 
                break;
            default:
                break;
        }
    }
}
