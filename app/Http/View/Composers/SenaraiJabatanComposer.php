<?php

namespace App\Http\View\Composers;

use App\GE_Jabatan;
use App\PermohonanBaru;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SenaraiJabatanComposer
{
    /**
     * Bind data to the view.
     * 
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {  
        $jabatans = GE_Jabatan::all('ge_kod_jabatan', 'ge_keterangan_jabatan');

        $view->with('jabatans', $jabatans);
    }
}