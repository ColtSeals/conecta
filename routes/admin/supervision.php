<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:supervision'])->group(function () {

    Route::get('battalions', \App\Livewire\Supervision\Occurrences\Battalions::class)
        ->name('battalions.occurrences');

    Route::get('occurrences', \App\Livewire\Supervision\Occurrences::class)
        ->name('search.occurrences');

    Route::get('cabin', \App\Livewire\Supervision\Cabin::class)
        ->name('supervision.cabin');
});
