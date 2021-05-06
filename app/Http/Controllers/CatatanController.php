<?php

namespace App\Http\Controllers;

use App\Catatan;
use App\PermohonanBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PermohonanStatusChangedEvent;

class CatatanController extends Controller
{
    public function saveCatatan(Request $request, $idPermohananBaru)
    {
        $array = array();
        $permohonan = PermohonanBaru::findOrFail($idPermohananBaru);
        $catatan = new Catatan([
            'catatan' => $request->input('catatan'),
            'jenis_permohonan' => $request->input('jenis_permohonan'),
            'is_kemaskini' => $request->input('is_kemaskini'),
            'CUSTOMERID' => Auth::id(),
            'masa' => now()
        ]);

        $permohonan->catatans()->save($catatan);

        event(new PermohonanStatusChangedEvent($permohonan, 0, 0, 0));
    }
}
