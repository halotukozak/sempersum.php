<?php

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
    Route::get('/deezer', function () {
        return view('DeezerInstruction');
    })->name('deezer');

});

Route::get('/song/{song}', Show::class)->name('showSong');
Route::get('/artist/{artist}', function () {
    echo 'W przyszłości...';
})->name('artist');

