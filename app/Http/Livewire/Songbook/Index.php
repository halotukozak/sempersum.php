<?php

namespace App\Http\Livewire\Songbook;

use App\Models\Songbook;
use Livewire\Component;

class Index extends Component
{
    public Songbook $songbook;

    public function render()
    {
        return view('livewire.songbook.index');
    }
}
