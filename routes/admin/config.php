<?php

use Illuminate\Support\Facades\Route;

Route::get('role', App\Livewire\Config\Role::class)->name('config.role');

Route::get('battalion', App\Livewire\Config\Battalion::class)->name('config.battalion');
