<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;


class FavouritesSection extends Component
{
    public $songs;

    public function mount()
    {
        $this->songs = \App\Models\Song::whereIn('id', current_user()->likes->pluck('song_id'))->get();

    }

    public function render()
    {
        return view('livewire.dashboard.favourites-section');
    }
}
