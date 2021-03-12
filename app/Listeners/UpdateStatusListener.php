<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\PermohonanStatusChangedEvent;

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
     *                             1 -> renewed because it needs kemaskini OR KT sends for the next step
     * 
     * is_renewedPermohonan is disregarded if is_terima == 0 (rejected)
     * 
     * @param  PermohonanStatusChangedEvent  $event
     * @return void
     */
    public function handle(PermohonanStatusChangedEvent $event)
    {
        $event->permohonan->refresh();

        $jenis_permohonan = $event->permohonan->jenis_permohonan;
        $id_peg_sokong =  $event->permohonan->id_peg_sokong;

        $is_batal = $event->is_batal;
        $is_terima = $event->is_terima;
        $is_renewedPermohonan = $event->is_renewedPermohonan;
        $is_peg_sokong = Auth::id() == $id_peg_sokong ? 1 : 0;

        if ($is_terima) {
            $this->permohonanApproved($event, $is_peg_sokong);

        } elseif ($is_renewedPermohonan){
            $event->permohonan->status = "DALAM PROSES";
            $event->permohonan->progres = 'Belum disahkan';

        } elseif ($is_batal) {
            $event->permohonan->status = "BATAL";

        } else {
            $this->permohonanRejected($event);

        }

        $event->permohonan->save();
        $event->permohonan->refresh();
    }

    public function permohonanApproved(PermohonanStatusChangedEvent $event, $is_peg_sokong)
    {
        if ($is_peg_sokong) {
            $event->permohonan->peg_sokong_approved = 1;
            $event->permohonan->progres = 'Sah P1';
            
        } else {
            $event->permohonan->peg_sokong_approved = 0;
            $event->permohonan->status = "DITERIMA";
            $event->permohonan->progres = 'Sah P2';

        }
    }

    public function permohonanRejected(PermohonanStatusChangedEvent $event)
    {
        $event->permohonan->peg_sokong_approved = 0;

        $is_kemaskini = $event->permohonan->catatans()->orderBy('created_at','desc')->first()->is_kemaskini;

        if ($is_kemaskini) {
            $event->permohonan->status = "PERLU KEMASKINI";
            $event->permohonan->progres = 'Belum disahkan';

        } else {
            $event->permohonan->status = "DITOLAK";
        }
    }
}
