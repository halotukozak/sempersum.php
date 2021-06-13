<?php

namespace App\Http\Livewire\Songbooks;

use App\Models\Songbook;
use Livewire\Component;

class Index extends Component
{
    public Songbook $songbook;

    public function mount(Songbook $songbook)
    {

    }

    public function render()
    {
        return view('livewire.songbooks.index');
    }
}
