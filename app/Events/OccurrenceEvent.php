<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OccurrenceEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $occurrence;

    public function __construct($occurrence)
    {
        $this->occurrence = $occurrence;
    }

    public function broadcastOn()
    {
        return new Channel('occurrences.' . $this->occurrence->battalion_id);
    }

}
