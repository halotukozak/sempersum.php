<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class Dashboard extends Component
{
    public string $page = 'favourites';

    public function mount(Song $song)
    {
        if ($song->exists)
            $this->page = 'create';
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
