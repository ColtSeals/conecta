<?php

namespace App\Broadcasting;

use App\Models\Battalion;
use App\Models\User;

class OccurrenceChannel
{
    public function join(User $user, Battalion $battalion): bool
    {
        return $user->userBattalion()->first()->battalion_id === (string) $battalion->id;
    }
}
