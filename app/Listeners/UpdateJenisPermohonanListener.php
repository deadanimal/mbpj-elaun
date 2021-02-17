<?php

namespace App\Listeners;

use App\Events\PermohonanStatusChangedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateJenisPermohonanListener
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
     * PC = permohonan closed
     * 
     * @param  PermohonanStatusChangedEvent  $event
     * @return void
     */
    public function handle(PermohonanStatusChangedEvent $event)
    {
        $event->permohonan->refresh();
        $array = array(0 =>'OT', 1 => 'PS', 2 => 'EL', 4 => 'KPA', 5 => 'KSA', 6 => 'PC');

        $jenis_permohonan = $event->permohonan->jenis_permohonan;
        $level_permohonan = substr($jenis_permohonan, 0, -1);

        $is_individu = $jenis_permohonan[2] == "1" ? 1 : 0;
        $is_not_approved_peg_sokong = $event->permohonan->peg_sokong_approved == 0 ? 1 : 0;

        $key = array_search($level_permohonan, $array); 

        switch ($event->permohonan->status) {
            case 'DITERIMA':
                if ($is_not_approved_peg_sokong) {
                    $event->permohonan->jenis_permohonan_kakitangan = $event->permohonan->jenis_permohonan;
                    $event->permohonan->jenis_permohonan = $array[$key+1].($is_individu ? 1 : 2);
                }
                break;
            case 'PERLU KEMASKINI': 
            case 'DALAM PROSES':
            case 'DITOLAK':
                $event->permohonan->jenis_permohonan_kakitangan = $event->permohonan->jenis_permohonan;
                break;
            
            default:
                # code...
                break;
        }
        $event->permohonan->save();
        $event->permohonan->refresh();
    }
}
