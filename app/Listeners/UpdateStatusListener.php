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
     *                             1 -> renewed because it needs kemaskini
     * is_renewedPermohonan is diregarded if is_terima == 0 (rejected)
     * 
     * @param  PermohonanStatusChangedEvent  $event
     * @return void
     */
    public function handle(PermohonanStatusChangedEvent $event)
    {
        $event->permohonan->refresh();

        $jenis_permohonan = $event->permohonan->jenis_permohonan;
        $id_peg_sokong =  $event->permohonan->id_peg_sokong;

        $is_terima = $event->is_terima;
        $is_renewedPermohonan = $event->is_renewedPermohonan;
        $is_peg_sokong = Auth::id() == $id_peg_sokong ? 1 : 0;

        if ($is_terima) {
            if ($is_peg_sokong) {
                $event->permohonan->peg_sokong_approved = 1;
                
            } else {
                $event->permohonan->peg_sokong_approved = 0;
                $event->permohonan->status = "DITERIMA";

            }

        } elseif ($is_renewedPermohonan){
            $event->permohonan->status = "DALAM PROSES";

        } else {
            $is_kemaskini = $event->permohonan->catatans()->orderBy('created_at','desc')->first()->is_kemaskini;
            $event->permohonan->status = $is_kemaskini ? "PERLU KEMASKINI" : "DITOLAK";

        }

        $event->permohonan->save();
        $event->permohonan->refresh();
    }
}
