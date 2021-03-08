<?php

namespace App\Events;

use App\PermohonanBaru;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PermohonanStatusChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $permohonan;
    public $is_terima;
    public $is_renewedPermohonan;
    public $is_batal;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PermohonanBaru $permohonan, $is_terima, $is_renewedPermohonan, $is_batal)
    {
        $this->permohonan = $permohonan;
        $this->is_terima = $is_terima;
        $this->is_renewedPermohonan = $is_renewedPermohonan;
        $this->is_batal = $is_batal;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
