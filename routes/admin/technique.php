<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['role:technique, superadmin'])->group(function () {

    Route::get('users', App\Livewire\Technique\User::class)
        ->name('technique.users');

    Route::prefix('users')->group(function () {
        Route::get('logged', App\Livewire\Technique\User\Logged::class)
            ->name('technique.users.logged');

        Route::get('monitor', App\Livewire\Technique\User\Monitor::class)
            ->name('technique.users.monitor');
    });

});

