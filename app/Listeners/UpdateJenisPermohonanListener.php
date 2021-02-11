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
        $array = array(0 =>'OT', 1 => 'PS', 2 => 'EL', 3 => 'PC');

        $jenis_permohonan = $event->permohonan->jenis_permohonan;
        $level_permohonan = substr($jenis_permohonan, 0, -1);
        $is_individu = $jenis_permohonan[2] == "1" ? 1 : 0;

        $key = array_search($level_permohonan, $array); 
        $event->permohonan->jenis_permohonan = $array[$key+1].($is_individu ? 1 : 2);

        $event->permohonan->save();
        $event->permohonan->refresh();
    }
}
