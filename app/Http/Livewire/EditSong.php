<?php

namespace App\Http\Livewire;

use App\Models\Song as Model;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;
use Aerni\Spotify\Facades\SpotifyFacade as Spotify;

class EditSong extends Component
{
    public $song;
    public $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];


    public function mount($song)
    {
        $this->song = Model::where('slug', $song)->withLikes()->first();

        abort_if($this->song == null, 404);

    }

    public function render()
    {
        return view('livewire.edit-song');
    }
}
