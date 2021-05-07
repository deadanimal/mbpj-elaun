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
        dd($tarikh_mula_kerja);
        $user_ekedatangan = User::with([
                                        'ekedatangan' => function ($query) {
                                            $query->where('tarikh', $tarikh_mula_kerja);
                                }])->findOrFail($id_user);
        dd($user_ekedatangan);
                    
        return response()->json([
                    'error' => false,
                    'ekedatangans'  => $user_ekedatangan->ekedatangan,
                    'user_name' => $user_ekedatangan->NAME
                ], 200);
    }
}
