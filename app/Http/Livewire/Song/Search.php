<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Search extends Component
{
    public $song;
    public $likes;
    public $liked;

    public function like()
    {
        if (current_user()) {
            if ($this->song->isLikedBy(current_user())) {
                $this->song->dislike();
                $this->likes--;
                if ($this->likes == 0) {
                    $this->likes = null;
                }
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

        if ($song->likes == null || $song->likes == 0) {
            $this->likes = null;
        } else {
            $this->likes = $song->likes;
        }
    }

    public function render()
    {
        return view('livewire.song.search');
    }
}
