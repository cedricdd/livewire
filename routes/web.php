<?php

use App\Http\Controllers\ArticleController;
use App\Livewire\ArticleIndex;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show')->where('article', '[0-9]+');