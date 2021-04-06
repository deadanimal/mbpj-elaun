<?php

namespace App\Http\View\Composers;

use App\Jabatan;
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
        $jabatans = Jabatan::all('GE_KOD_JABATAN', 'GE_KETERANGAN_JABATAN');

        $view->with('jabatans', $jabatans);
    }
}