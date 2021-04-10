<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;

class Show extends Component
{
    public $song;
    public $likes;
    public $liked;

    public function mount($song)
    {
        $this->song = Song::where('slug', $song)->withLikes()->first();

        $this->liked = $this->song->isLikedBy(current_user());

        if ($this->song->likes == null || $this->song->likes == 0) {
            $this->likes = null;
        } else {
            $this->likes = $this->song->likes;
        }
    }

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

    public function render()
    {
        return view('livewire.song.show');
    }
}
