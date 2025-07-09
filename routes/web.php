<?php

use App\Http\Controllers\ArticleController;
use App\Livewire\ArticleIndex;
use App\Livewire\Search;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show')->where('article', '[0-9]+');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
