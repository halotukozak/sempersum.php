<?php

use App\Http\Livewire\Artist;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Song\Create;
use App\Http\Livewire\Song\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
})->name('start');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/song/create', Create::class)->name('createSong');
    Route::get('/song/{song}/edit', Create::class)->name('editSong');
});

Route::get('/song/{song}', Show::class)->name('showSong');
Route::get('/artist/{artist}', Artist::class)->name('artist');

