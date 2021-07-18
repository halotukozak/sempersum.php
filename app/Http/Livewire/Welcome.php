<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Welcome extends Component
{
    public Collection $tags;

    public function mount()
    {
        $this->tags = Tag::all('name');
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
