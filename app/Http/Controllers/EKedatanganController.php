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
        $tarikh_permohonan = PermohonanBaru::findOrFail($id_permohonan_baru)->created_at->format('d-m-Y');

        $user_ekedatangan = User::with('ekedatangan')->findOrFail($id_user);
        
        return response()->json([
                    'error' => false,
                    'ekedatangans'  => $user_ekedatangan->ekedatangan,
                    'user_name' => $user_ekedatangan->NAME
                ], 200);
    }
}
