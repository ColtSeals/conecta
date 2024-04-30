<?php

namespace App\Policies;

use App\Models\Occurrence;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OccurrencePolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Occurrence $occurrence): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Occurrence $occurrence): bool
    {
        //
    }

    public function delete(User $user, Occurrence $occurrence): bool
    {
        //
    }

    public function restore(User $user, Occurrence $occurrence): bool
    {
        //
    }

    public function forceDelete(User $user, Occurrence $occurrence): bool
    {
        //
    }
}
