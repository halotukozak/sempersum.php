<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
})->name('start');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/song/create', \App\Http\Livewire\CreateSong::class)->name('createSong');
});


Route::get('/song/{song}', \App\Http\Livewire\Song::class)->name('song');

Route::get('/song/{song}/edit', \App\Http\Livewire\CreateSong::class)->name('editSong');

Route::get('/artist/{artist}', function () {
    echo 'wait';
})->name('artist');
