<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\ArticleEdit;
use App\Livewire\ArticleShow;
use App\Livewire\ArticleIndex;
use App\Livewire\ArticleCreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::get('articles/{article}', ArticleShow::class)->name('articles.show')->where('article', '[0-9]+');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard/create', ArticleCreate::class)->name('create-article');
    Route::get('/dashboard/{article}/edit', ArticleEdit::class)->name('edit-article')->where('article', '[0-9]+');
});