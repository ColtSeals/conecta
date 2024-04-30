<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:certificates'])->group(function () {

    Route::get('view', \App\Livewire\Certificates\Occurrences\View::class)
        ->name('certificates.view');

    Route::get('delete', \App\Livewire\Certificates\Occurrences\Delete::class)
        ->name('certificates.delete');


});
