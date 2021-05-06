<?php

namespace App\Listeners;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\PermohonanStatusChangedEvent;
use App\Notifications\TuntutanBerjayaNotification;
use App\Notifications\PermohonanBerjayaEmailNotification;
use App\Notifications\PermohonanRejectedEmailNotification;
use App\Notifications\PegawaiSokongApprovedEmailNotification;
use App\Notifications\PegawaiPelulusApprovedEmailNotification;
use App\Notifications\PermohonanNeedApprovalEmailNotification;
use App\Notifications\PermohonanNeedKemaskiniEmailNotification;

class UpdateStatusListener
{
    /**
     * Create the event listener. 
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Handle the event.
     * 
     * is_terima can be 0 -> rejected (TINDAKAN)
     *                  1 -> approved
     * 
     * is_renewedPermohonan can be 0 -> not a renewed pemohonan
     *                             1 -> renewed because it needs kemaskini OR KT 'approves' for the next step
     * 
     * is_renewedPermohonan is disregarded if is_terima == 0 (rejected)
     * 
     * @param  PermohonanStatusChangedEvent  $event
     * @return void
     */
    public function handle(PermohonanStatusChangedEvent $event)
    {
        $event->permohonan->refresh();
        $authRole = auth()->user()->role_id;

        $is_peg_sokong = Auth::id() == $event->permohonan->id_peg_sokong ? 1 : 0;

        if ($event->is_terima) {
            $this->permohonanApproved($event, $is_peg_sokong);

        } elseif ($event->is_renewedPermohonan){
            $event->permohonan->status = "DALAM PROSES";
            $event->permohonan->progres = 'Belum disahkan';

            $this->sendEmailNotificationToPegawaiAtasan($event, 'PS');

        } elseif ($event->is_batal) {
            $event->permohonan->status = "BATAL";
        } else {
            $this->permohonanRejected($event);
        }

        $event->permohonan->save();
        $event->permohonan->refresh();
    }

    
    public function permohonanApproved(PermohonanStatusChangedEvent $event, $is_peg_sokong)
    {
        $jenis_permohonan = substr($event->permohonan->jenis_permohonan, 0, -1);
        $jenis_permohonan_KT = substr($event->permohonan->jenis_permohonan_kakitangan, 0, -1);
        
        switch ($jenis_permohonan) {
            case 'KP':
                $event->permohonan->progres = 'Sah KP';
                $event->permohonan->kerani_pemeriksa_approved = 1;
                $this->sendEmailNotificationToPegawaiAtasan($event, 'KS');
                $this->sendEmailToKTPermohonanApproved($event, 'KP');
                break;
            case 'KS':
                $event->permohonan->progres = 'Tuntutan Diterima';
                $this->sendEmailToKTPermohonanApproved($event, 'KS');
                break;
            case 'DB':
                $event->permohonan->progres = 'Sah DB';
                break;
            default:
                if ($is_peg_sokong) {
                    $event->permohonan->peg_sokong_approved = 1;
                    $event->permohonan->progres = 'Sah P1';
                    $this->sendEmailToKTPermohonanApproved($event, 'PS');
                    $this->sendEmailNotificationToPegawaiAtasan($event, 'PP');
                } else {
                    $event->permohonan->peg_sokong_approved = 0;
                    $event->permohonan->status = "DITERIMA";
                    $event->permohonan->progres = 'Sah P2';

                    if ($jenis_permohonan_KT == 'EL') {
                        $event->permohonan->tarikh_pengesahan = now()->format('d-m-Y');
                        $event->permohonan->status_akhir = 1;
                        $this->sendEmailToKTPermohonanBerjaya($event);
                        $this->sendEmailNotificationToPegawaiAtasan($event, 'KP');
                    }

                    $this->sendEmailToKTPermohonanApproved($event, 'PP');
                }
                break;
        }
    }
            
    public function permohonanRejected(PermohonanStatusChangedEvent $event)
    {
        $event->permohonan->peg_sokong_approved = 0;
        $is_kemaskini = $event->permohonan->catatans()->orderBy('created_at','desc')->first()->is_kemaskini;
        
        if ($is_kemaskini) {
            $event->permohonan->status = "PERLU KEMASKINI";
            $event->permohonan->progres = 'Belum disahkan';
            $this->sendEmailToKTPerluKemaskini($event);
        } else {
            $event->permohonan->status = "DITOLAK";
            $this->sendEmailToKTRejected($event);
        }
    }

    public function sendEmailNotificationToPegawaiAtasan(PermohonanStatusChangedEvent $event, $peringkat)
    {
        switch ($peringkat) {
            case 'PS':
                $pegawai_sokong = User::findOrFail($event->permohonan->id_peg_sokong);
                $pegawai_sokong->notify(new PermohonanNeedApprovalEmailNotification($pegawai_sokong));  
                break;
            case 'PP':
                $pegawai_pelulus = User::findOrFail($event->permohonan->id_peg_pelulus);
                $pegawai_pelulus->notify(new PermohonanNeedApprovalEmailNotification($pegawai_pelulus)); 
                break;
            case 'KP':
                // Need updates for kerani pemeriksa
                $kerani_pemeriksa = User::findOrFail($event->permohonan->id_peg_pelulus);
                $kerani_pemeriksa->notify(new PermohonanNeedApprovalEmailNotification($kerani_pemeriksa)); 
                break;
            case 'KS':
                // Need updates for kerani semakan
                $kerani_semakan = User::findOrFail($event->permohonan->id_peg_pelulus);
                $kerani_semakan->notify(new PermohonanNeedApprovalEmailNotification($kerani_semakan)); 
                break;
        }
    }

    public function sendEmailToKTPermohonanApproved(PermohonanStatusChangedEvent $event, $peringkat)
    {
        switch ($peringkat) {
            case 'PS':
                foreach ($event->permohonan->users as $user) {
                    $user->notify(new PegawaiSokongApprovedEmailNotification($user));
                }
                break;
            case 'PP':
                foreach ($event->permohonan->users as $user) {
                    $user->notify(new PegawaiPelulusApprovedEmailNotification($user));
                }
                break;
            case 'KP':
                foreach ($event->permohonan->users as $user) {
                    $user->notify(new PegawaiPelulusApprovedEmailNotification($user));
                }
                break;
            case 'KS':
                foreach ($event->permohonan->users as $user) {
                     $user->notify(new TuntutanBerjayaNotification($user));
                }
                break;
        }
    }

    public function sendEmailToKTRejected(PermohonanStatusChangedEvent $event)
    {
        foreach ($event->permohonan->users as $user) {
            $user->notify(new PermohonanRejectedEmailNotification($user, $event->permohonan));
        }
    }

    public function sendEmailToKTPerluKemaskini(PermohonanStatusChangedEvent $event)
    {
        foreach ($event->permohonan->users as $user) {
            $user->notify(new PermohonanNeedKemaskiniEmailNotification($user, $event->permohonan));
        }
    }

    public function sendEmailToKTPermohonanBerjaya(PermohonanStatusChangedEvent $event)
    {
        foreach ($event->permohonan->users as $user) {
            $user->notify(new PermohonanBerjayaEmailNotification($user));
        }
    }
}
