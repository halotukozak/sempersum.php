<?php

namespace App\Http\Livewire\Song;

use App\Models\Song as Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $song;
    public $likes;
    public $liked;
    public int $preferred_streaming_service = 3;
    public array $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];

    public function mount($song)
    {
        $this->song = Model::where('slug', $song)->withLikes()->first();

        abort_if($this->song == null, 404);

        $this->liked = $this->song->isLikedBy(current_user());

        if ($this->song->likes == null || $this->song->likes == 0) {
            $this->likes = null;
        } else {
            $this->likes = $this->song->likes;
        }

        $this->preferred_streaming_service();

    }

    public function like()
    {
        if (Auth::check()) {
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
        } else {
            $this->redirect(route('login'));
        }

    }

    public function verify()
    {
        $this->song->verify();
    }

    protected function preferred_streaming_service()
    {
        if (Auth::check()) {
            switch (current_user()->preferred_streaming_service) {
                case ('youtube'):
                    $this->preferred_streaming_service = 1;
                    break;
                case ('spotify'):
                    $this->preferred_streaming_service = 2;
                    break;
                case ('deezer'):
                    $this->preferred_streaming_service = 4;
                    break;
                case ('soundcloud'):
                default:
                    $this->preferred_streaming_service = 3;
                    break;
            }
        } else $this->preferred_streaming_service = 3;

    }

    public function render()
    {
        return view('livewire.song.show');
    }
}
