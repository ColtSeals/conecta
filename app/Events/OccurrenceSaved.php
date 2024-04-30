<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OccurrenceSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $battalionId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($battalionId)
    {
        $this->battalionId = $battalionId;
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
