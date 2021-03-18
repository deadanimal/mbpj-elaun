<?php

namespace App\Http\View\Composers;

use App\PermohonanBaru;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardCardsComposer
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
        $jumlahTuntutanTahunSemasa = PermohonanBaru::whereYear('created_at', now()->year)->get()->count();
        $jumlahTuntutanKerjaLebihMasa = PermohonanBaru::where('id_peg_sokong')->get()->count();
        $jumlahTuntutanDiluluskan = PermohonanBaru::where('status_akhir', 1)->count();
        $jumlahTuntutanTidakDiluluskan = PermohonanBaru::where('status_akhir', 0)->count();
        
        $view->with('jumlahTuntutanTahunSemasa', $jumlahTuntutanTahunSemasa)
             ->with('jumlahTuntutanKerjaLebihMasa', $jumlahTuntutanKerjaLebihMasa)
             ->with('jumlahTuntutanDiluluskan', $jumlahTuntutanDiluluskan)
             ->with('jumlahTuntutanTidakDiluluskan', $jumlahTuntutanTidakDiluluskan);
    }
}