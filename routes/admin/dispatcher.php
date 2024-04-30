<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:dispatcher'])->group(function () {

    Route::get('cabin', \App\Livewire\Dispatcher\Cabin::class)
        ->name('dispatcher.cabin');

    Route::get('dispatcher', \App\Livewire\Dispatcher\Search::class)
        ->name('search.dispatcher');


});


