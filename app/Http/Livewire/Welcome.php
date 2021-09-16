<?php

namespace App\Http\Livewire;

use App\Models\Song;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Welcome extends Component
{
    public Collection $tags;
    public Collection $songs;

    public function mount()
    {
        $this->tags = Tag::all('name');
        $this->songs = Song::latest()->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
