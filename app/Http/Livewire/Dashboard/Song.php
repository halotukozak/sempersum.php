<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Song as Model;
use Livewire\Component;

class Song extends Component
{
    public Model $song;

    public function render()
    {
        return view('livewire.dashboard.song');
    }
}
