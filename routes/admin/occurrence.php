<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:atendent'])->group(function () {

    Route::get('create', App\Livewire\Occurrence::class)
        ->name('occurrence.create');

    Route::get('occurrence', \App\Livewire\Occurrence\Search::class)
        ->name('search.occurrence');

});
