<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Song extends Component
{
    public $song;

    public function render()
    {
        return view('livewire.dashboard.song');
    }
}
