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
        // $permohonans
        $user_permohonans = User::find(Auth::id())->with('permohonans')->get();
        // $jumlahTuntutanTahunSemasa = $user_permohonans->permohonans
        //                                 ->filter(function ($permohonan){
        //                                     return $permohonan->created_at == now()->year;
        //                                 })->count();

        
        // $jumlahTuntutanTahunSemasa = 

        $view->with('jumlahTuntutanTahunSemasa', $jumlahTuntutanTahunSemasa)
             ->with('jumlahTuntutanKerjaLebihMasa', $jumlahTuntutanKerjaLebihMasa)
             ->with('jumlahTuntutanDiluluskan', $jumlahTuntutanDiluluskan)
             ->with('jumlahTuntutanTidakDiluluskan', $jumlahTuntutanTidakDiluluskan);
    }
}