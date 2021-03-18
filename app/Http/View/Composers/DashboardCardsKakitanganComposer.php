<?php

namespace App\Http\View\Composers;

use App\PermohonanBaru;
use Illuminate\View\View;
use App\permohonan_with_users;
use Illuminate\Support\Facades\Auth;

class DashboardCardsKakitanganComposer
{
    /**
     * Bind data to the view.
     * 
     * Status akhir = 0 ditolak
     *              = 1 diterima
     *              = 2 belun selesai
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {  
        $jumlahTuntutanTahunSemasa = permohonan_with_users::

        $view->with('jumlahTuntutanTahunSemasa', $jumlahTuntutanTahunSemasa)
             ->with('jumlahTuntutanKerjaLebihMasa', $jumlahTuntutanKerjaLebihMasa)
             ->with('jumlahTuntutanDiluluskan', $jumlahTuntutanDiluluskan)
             ->with('jumlahTuntutanTidakDiluluskan', $jumlahTuntutanTidakDiluluskan);
    }
}