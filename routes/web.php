<?php

use App\Http\Livewire\Artist;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Song\Show;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Songbook\Manage;

Route::get('/', function () {
    return view('start');
})->name('start');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/songbook', Manage::class)->name('createSongbook');
    Route::get('/songbook/{songbook}', Manage::class)->name('songbook');
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard/{song}/edit', Dashboard::class)->name('editSong');
});

Route::get('/song/{song}', Show::class)->name('showSong');
Route::get('/artist/{artist}', Artist::class)->name('artist');

