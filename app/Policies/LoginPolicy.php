<?php

namespace App\Policies;

use App\Models\User;

class LoginPolicy
{
    public function login(User $user)
    {
        return $user->hasRole('logins');
    }
}
