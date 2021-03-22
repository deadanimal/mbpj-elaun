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
        switch (Auth::user()->role_id) {
            case '2':
                $jumlahTuntutanTahunSemasa = PermohonanBaru::pegawaiSokong()
                                                    ->whereYear('created_at', now()->year)
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanKerjaLebihMasa = PermohonanBaru::pegawaiSokong()
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanDiluluskan = PermohonanBaru::pegawaiSokong()
                                                    ->where('status_akhir', 1)
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanTidakDiluluskan = PermohonanBaru::pegawaiSokong()
                                                    ->where('status_akhir', 0)
                                                    ->get()
                                                    ->count();
                break;
            case '4':
                $jumlahTuntutanTahunSemasa = PermohonanBaru::pegawaiSokongAtauPelulus()
                                                    ->whereYear('created_at', now()->year)
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanKerjaLebihMasa = PermohonanBaru::pegawaiSokongAtauPelulus()
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanDiluluskan = PermohonanBaru::pegawaiSokongAtauPelulus()
                                                    ->where('status_akhir', 1)
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanTidakDiluluskan = PermohonanBaru::pegawaiSokongAtauPelulus()
                                                    ->where('status_akhir', 0)
                                                    ->get()
                                                    ->count();
                break;
            case '5':
                $jumlahTuntutanTahunSemasa = PermohonanBaru::pegawaiPelulus()
                                                    ->whereYear('created_at', now()->year)
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanKerjaLebihMasa = PermohonanBaru::pegawaiPelulus()
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanDiluluskan = PermohonanBaru::pegawaiPelulus()
                                                    ->where('status_akhir', 1)
                                                    ->get()
                                                    ->count();
                $jumlahTuntutanTidakDiluluskan = PermohonanBaru::pegawaiPelulus()
                                                    ->where('status_akhir', 0)
                                                    ->get()
                                                    ->count();
                break;
        }

        $view->with('jumlahTuntutanTahunSemasa', $jumlahTuntutanTahunSemasa)
             ->with('jumlahTuntutanKerjaLebihMasa', $jumlahTuntutanKerjaLebihMasa)
             ->with('jumlahTuntutanDiluluskan', $jumlahTuntutanDiluluskan)
             ->with('jumlahTuntutanTidakDiluluskan', $jumlahTuntutanTidakDiluluskan);
    }
}