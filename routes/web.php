<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
})->name('start');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/song/create', \App\Http\Livewire\Song\Create::class)->name('createSong');
    Route::get('/song/{song}/edit', \App\Http\Livewire\Song\Create::class)->name('editSong');
});

Route::get('/song/{song}', \App\Http\Livewire\Song\Show::class)->name('showSong');
Route::get('/artist/{artist}', function () {
    echo 'wait';
})->name('artist');
