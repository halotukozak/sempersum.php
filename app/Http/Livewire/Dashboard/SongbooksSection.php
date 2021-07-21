<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Songbook;
use App\Rules\SongbookPasswordRule;
use Livewire\Component;

class SongbooksSection extends Component
{
    public function render()
    {
        return view('livewire.dashboard.songbooks-section')->with('songbooks', current_user()->songbooks);
    }
}
