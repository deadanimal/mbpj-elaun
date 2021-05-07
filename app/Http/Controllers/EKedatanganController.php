<?php

namespace App\Http\Controllers;

use App\User;
use App\PermohonanBaru;
use Illuminate\Http\Request;

class EKedatanganController extends Controller
{
    public function findEkedatangan(Request $request , $id_user)
    {
        $id_permohonan_baru = $request->input('id_permohonan_baru');
        $tarikh_mula_kerja = PermohonanBaru::findOrFail($id_permohonan_baru)->tarikh_mula_kerja;

        $user_ekedatangan = User::with('ekedatangan')->findOrFail($id_user);

        // $ekedatangan = ($user_ekedatangan->ekedatangans)->map(function ($ekedatangan) use ($tarikh_mula_kerja) {
        //                     if ($ekedatangan->tarikh == $tarikh_mula_kerja) {
        //                         return $ekedatangan;
        //                     };
                    
        return response()->json([
                    'error' => false,
                    'ekedatangans'  => $user_ekedatangan->ekedatangan,
                    'user_name' => $user_ekedatangan->NAME
                ], 200);
    }
}
