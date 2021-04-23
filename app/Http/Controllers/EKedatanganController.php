<?php

namespace App\Http\Controllers;

use App\User;
use App\eKedatangan;
use Illuminate\Http\Request;

class EKedatanganController extends Controller
{
    public function findEkedatangan($id_user)
    {
        $user_ekedatangan = User::with('ekedatangan')->findOrFail($id_user);

        return response()->json([
                    'error' => false,
                    'ekedatangans'  => $user_ekedatangan->ekedatangan,
                    'user_name' => $user_ekedatangan->NAME
                ], 200);
    }
}
