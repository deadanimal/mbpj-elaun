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
        $array = [];

        $permohonan = PermohonanBaru::where('id_permohonan_baru', $idPermohananBaru)->first();

        $permohonanBerkumpulan = permohonan_with_users::where('id_permohonan_baru', $idPermohananBaru)->first();

        $users = $permohonanBerkumpulan->users_id;
        $usersExploded = explode(",", $users);

        $penyelia = User::find($permohonan->id_penyelia);
        $array = Arr::prepend($array, $penyelia, 'penyelia');

        $ketuaBahagian = User::find($permohonan->id_ketuaBahagian);
        $array = Arr::prepend($array, $ketuaBahagian, 'ketuaBahagian');

        $ketuaJabatan = User::find($permohonan->id_ketuaJabatan);
        $array = Arr::prepend($array, $ketuaJabatan, 'ketuaJabatan');

        $keraniPemeriksa = User::find($permohonan->id_keraniPemeriksa);
        $array = Arr::prepend($array, $keraniPemeriksa, 'keraniPemeriksa');

        $keraniSemakan = User::find($permohonan->id_keraniSemakan);
        $array = Arr::prepend($array, $keraniSemakan, 'keraniSemakan');

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                    'arrayKelulusan' => $array,
                    'senaraiKakitangan' => $usersExploded
                ], 200);
    }

    public function updateKelulusan($idPermohonanBaru)
    {
        $idAuthenticatedUser = Auth::id();
        $user = Auth::user();
        $role = $user->role_id;
        $permohonan = PermohonanBaru::find($idPermohonanBaru);

        switch ($role) {
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
