<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:manager'])->group(function () {

    Route::get('battalions', App\Livewire\Manager\Battalion::class)->name('manager.battalions');

    Route::get('natures', App\Livewire\Manager\Nature::class)->name('manager.natures');
    Route::get('trees', App\Livewire\Manager\Tree::class)->name('manager.trees');

    Route::get('nature/{nature}', App\Livewire\Manager\Nature\Show::class)
        ->name('manager.nature');

    Route::get('tree/{tree}', App\Livewire\Manager\Tree\Show::class)->name('manager.tree.show');

});

