<?php

use App\Livewire\Dashboard;
use App\Livewire\ArticleShow;
use App\Livewire\ArticleIndex;
use App\Livewire\ArticleCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/dashboard/create-article', ArticleCreate::class)->name('create-article');
Route::get('articles/{article}', ArticleShow::class)->name('articles.show')->where('article', '[0-9]+');