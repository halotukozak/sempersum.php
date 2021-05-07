<?php

namespace App\Http\Livewire\Song;

use Aerni\Spotify\Facades\SpotifyFacade as Spotify;
use App\Models\Song as Model;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class Show extends Component
{
    public $song;
    public $likes;
    public $liked;
    public $preferred_playback = null;
    public $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];

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

        $this->preferedPlayback();

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
        } else {
            $this->redirect(route('login'));
        }

    }

    protected function preferedPlayback()
    {
        if (current_user()) {
            switch (current_user()->preferred_playback) {
                case ('youtube'):
                    $this->preferred_playback = 1;
                    break;
                case ('spotify'):
                    $this->preferred_playback = 2;
                    break;
                case ('deezer'):
                    $this->preferred_playback = 4;
                    break;
                case ('soundcloud'):
                default:
                    $this->preferred_playback = 3;
                    break;
            }
        } else $this->preferred_playback = 3;

    }

    public function render()
    {
        return view('livewire.song.show');
    }
}
