<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use Livewire\Component;
use App\Rules\DeezerId;
use App\Rules\KeyOK;
use App\Rules\SoundcloudId;
use App\Rules\SpotifyId;
use App\Rules\YoutubeId;

class CreateSong extends Component
{
    public $title;
    public $text;
    public $spotifyId;
    public $deezerId;
    public $youtubeId;
    public $soundcloudId;
    public $key;
    public $artist;
    public $tags;
    public $isVerified;

    public $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];

    protected $listeners = ['artistUpdated' => 'setArtist'];

    public function addSong()
    {
        return;
        $this->validate([

        ]);
    }

    public function setArtist($info)
    {
        $this->artist = Artist::find($info['value']);
    }

    public function updated($field)
    {
        $this->title = ucfirst($this->title);


        $this->validateOnly($field, [
            'title' => ['required', 'min:3', 'max:255'],
            'text' => ['required'],
            'spotifyId' => ['unique:songs,spotifyId', new SpotifyId],
            'youtubeId' => ['unique:songs,youtubeId', new YoutubeId],
            'deezerId' => ['integer', 'unique:songs,deezerId', new DeezerId],
            'soundcloudId' => ['url', 'unique:songs,soundcloudId', new SoundcloudId],
            'tags' => ['exists:tags,id'],
            'isVerified' => [false],
            'key' => ['required', new KeyOK],
//            'artistId' => ['exists:artists']
        ]);
    }

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.create-song');
    }
}
