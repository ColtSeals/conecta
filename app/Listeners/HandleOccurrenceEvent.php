<?php

namespace App\Listeners;

use App\Events\OccurrenceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleOccurrenceEvent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OccurrenceEvent $event): void
    {
        \Log::info('Processando evento de ocorrência', ['occurrence' => $event->occurrence]);
    }

}
