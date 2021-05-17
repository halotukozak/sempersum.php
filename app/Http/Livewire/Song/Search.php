<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Search extends Component
{
    public Song $song;
    public int $likes = 0;
    public bool $liked;

    public function like()
    {
        if (current_user()) {
            if ($this->liked) {
                $this->song->dislike();
                $this->likes--;
                $this->liked = false;
            } else {
                $this->song->like();
                $this->likes++;
                $this->liked = true;
            }
        }
        else {
            $this->redirect(route('login'));
        }
    }


    public function mount(Song $song)
    {
        $this->song = $song;

        $this->liked = $song->isLikedBy(current_user());

        if ($song->likes) {
            $this->likes = $song->likes;
        }
    }

    public function render()
    {
        return view('livewire.song.search');
    }
}
