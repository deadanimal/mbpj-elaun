<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\PermohonanStatusChangedEvent;

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
        $array = array(0 =>'OT', 1 => 'PS', 2 => 'EL', 3 => 'KP', 4 => 'KS', 5 => 'PC');

        $jenis_permohonan = $event->permohonan->jenis_permohonan;
        $jenis_permohonan_kakitangan = $event->permohonan->jenis_permohonan_kakitangan;
        $level_permohonan = substr($jenis_permohonan, 0, -1);
        $level_permohonan_kakitangan = substr($jenis_permohonan_kakitangan, 0, -1);

        $is_individu = $jenis_permohonan[2] == "1" ? 1 : 0;

        $key = array_search($level_permohonan, $array); 

        switch ($event->permohonan->status) {
            case 'DITERIMA':
                if ($event->permohonan->peg_sokong_approved) break;

                // change jenis_permohonan to KP when DB approves
                if ($event->permohonan->is_for_datuk_bandar) {
                    $event->permohonan->jenis_permohonan = 'KP';
                    break;
                }

                // jenis_permohonan_kakitangan stagnant after EL
                if ($level_permohonan_kakitangan != 'EL') {
                    $event->permohonan->jenis_permohonan_kakitangan = $event->permohonan->jenis_permohonan;
                }

                $event->permohonan->jenis_permohonan = $array[$key+1].($is_individu ? 1 : 2);
                break;
            case 'PERLU KEMASKINI': 
            case 'DALAM PROSES':
                $event->permohonan->jenis_permohonan_kakitangan = $event->permohonan->jenis_permohonan;
                break;
            case 'DITOLAK':
                $event->permohonan->jenis_permohonan_kakitangan = $event->permohonan->jenis_permohonan;
                $event->permohonan->status_akhir = 0;

                foreach ($event->permohonan->users as $user) {
                    $event->permohonan
                          ->users()
                          ->updateExistingPivot($user->CUSTOMERID, array(
                                                    'is_rejected_individually' => 1
                                                ));
                }
                break;
            case 'BATAL':
                $event->permohonan->status_akhir = 0;
                break;
            default: 
                # code...
                break;
        }
        $event->permohonan->save();
        $event->permohonan->refresh();
    }
}
