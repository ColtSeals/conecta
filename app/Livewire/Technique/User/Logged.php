<?php

namespace App\Livewire\Technique\User;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Logged extends Component
{
    public $onlineUsers = [];

    #[On('echo-presence:online-users,here')]
    public function updateOnlineUsers($users): void
    {
        $this->onlineUsers = $users;
    }

    #[On('echo-presence:online-users,joining')]
    public function addOnlineUser($user): void
    {
        $this->onlineUsers[] = $user;
    }

    #[On('echo-presence:online-users,leaving')]
    public function removeOnlineUser($user): void
    {
        $this->onlineUsers = array_filter($this->onlineUsers, function ($u) use ($user) {
            return $u['user']['id'] !== $user['user']['id'];
        });
    }

    public function render(): View
    {
        return view('livewire.technique.user.logged');
    }
}
