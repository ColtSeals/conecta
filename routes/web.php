<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'verify.battalion'])->group(function () {
    Route::get('dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('developers', \App\Livewire\Developer::class)->name('developers');

    Route::get('nature/search', [\App\Http\Controllers\NatureController::class, 'search'])->name('nature.search');
    Route::get('question/search', [\App\Http\Controllers\QuestionController::class, 'search'])->name('question.search');
});

require __DIR__.'/auth.php';
