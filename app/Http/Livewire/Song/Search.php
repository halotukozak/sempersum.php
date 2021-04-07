<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Search extends Component
{
    public $song;
    public $likes;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function like()
    {
        if ($this->song->isLikedBy(current_user())) {
            $this->song->dislike();
        } else {
            $this->song->like();
        }
        $this->emit('refreshComponent');
    }

    public function mount(Song $song)
    {
        $this->song = $song;
        $this->likes = $song->likes;

    }

    public function render()
    {
        return view('livewire.song.search');
    }
}
