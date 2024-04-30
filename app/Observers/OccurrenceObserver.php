<?php

namespace App\Observers;

use App\Events\OccurrenceEvent;
use App\Models\Occurrence;

class OccurrenceObserver
{
    public function created(Occurrence $occurrence): void
    {
        OccurrenceEvent::dispatch($occurrence->occurrence, $occurrence->battalion_id);
    }

    public function updated(Occurrence $occurrence): void
    {
        OccurrenceEvent::dispatch($occurrence->occurrence, $occurrence->battalion_id);
    }

    public function deleted(Occurrence $occurrence): void
    {
        OccurrenceEvent::dispatch($occurrence->occurrence, $occurrence->battalion_id);
    }

    public function restored(Occurrence $occurrence): void
    {
        OccurrenceEvent::dispatch($occurrence->occurrence, $occurrence->battalion_id);
    }

    public function forceDeleted(Occurrence $occurrence): void
    {
        OccurrenceEvent::dispatch($occurrence->occurrence, $occurrence->battalion_id);
    }
}
