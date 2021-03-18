<?php

namespace App\Http\Controllers;

use App\Catatan;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use App\Events\PermohonanStatusChangedEvent;

class CatatanController extends Controller
{
    public function saveCatatan(Request $request, $idPermohananBaru)
    {
        $array = array();
        $permohonan = PermohonanBaru::find($idPermohananBaru);
        $catatan = new Catatan([
            'catatan' => $request->input('catatan'),
            'jenis_permohonan' => $request->input('jenis_permohonan'),
            'is_kemaskini' => $request->input('is_kemaskini'),
            'id_user' => auth()->id(),
            'masa' => now()
        ]);

        $permohonan->catatans()->save($catatan);

        // foreach ($permohonan->users as $user) {
        //     array_push($array, $user->permohonan_with_users->is_rejected_individually);
        // }   

        event(new PermohonanStatusChangedEvent($permohonan, 0, 0, 0));
    }
}
