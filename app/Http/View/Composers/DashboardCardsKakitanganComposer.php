<?php

namespace App\Http\View\Composers;

use App\User;
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
        $permohonans_users = PermohonanBaru::with('users')->get();                        

        $jumlahTuntutanKerjaLebihMasaKT = permohonan_with_users::select('USERID')
                                            ->where('USERID', Auth::id())
                                            ->get()
                                            ->count();
        $jumlahTuntutanTahunSemasaKT = permohonan_with_users::select('USERID')
                                            ->where('USERID', Auth::id())
                                            ->whereYear('created_at', now()->year)
                                            ->get()
                                            ->count();

        $view->with('jumlahTuntutanTahunSemasaKT', $jumlahTuntutanTahunSemasaKT)
             ->with('jumlahTuntutanKerjaLebihMasaKT', $jumlahTuntutanKerjaLebihMasaKT)
             ->with('jumlahTuntutanDiluluskanKT', $this->kiraJumlahTuntutanMengikutStatusAkhir($permohonans_users, 1))
             ->with('jumlahTuntutanTidakDiluluskanKT', $this->kiraJumlahTuntutanMengikutStatusAkhir($permohonans_users, 0));
    }

    public function kiraJumlahTuntutanMengikutStatusAkhir($permohonans_users, $status_akhir)
    {
        $tuntutanDiluluskanKT = $permohonans_users->filter(function ($permohonan) use ($status_akhir){
            if ($permohonan->status_akhir ==  $status_akhir) return $permohonan; 
        });

        return $jumlahTuntutanDiluluskanKT = $tuntutanDiluluskanKT->map(function ($permohonan) {
                                                foreach ($permohonan->users as $user) {
                                                    if ($user->USERID == Auth::id()) {
                                                        return $permohonan;
                                                    }
                                                }
                                            })->count();  
    }
}