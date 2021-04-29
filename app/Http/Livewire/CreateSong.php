<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Tag;
use Livewire\Component;
use App\Rules\DeezerId;
use App\Rules\KeyOK;
use App\Rules\SoundcloudId;
use App\Rules\SpotifyId;
use App\Rules\YoutubeId;
use Illuminate\Support\Str;
use Spotify;

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
    public $tags = [];
    public $isVerified;

    public $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];
    public $tagTerm;
    public $tagOptions;

    protected $listeners = ['artistUpdated' => 'setArtist',
        'spotifyIdUpdated' => 'setSpotifyId',
        'keyUpdated' => 'setKey',
        'tagsUpdated' => 'setTag',
        'deezerIdUpdated' => 'setDeezerId'
    ];

    public function addSong()
    {
        return;
        $this->validate([

        ]);
    }

    public function setDeezerId($info)
    {
        $this->deezerId = $info;
        $this->updated('deezerId');
    }

    public function setTag($info)
    {
        $tags = collect();
        $names = $info['tags'];
        foreach ($names as $name) {
            $tag = Tag::firstOrCreate(['name' => $name]);
            $tags->push($tag);
        }
        $this->tags = $tags;
    }

    public function setKey($info)
    {
        $this->key = $info['value'];
    }

    public function setArtist($info)
    {
        $this->artist = Artist::find($info['value']);
    }

    public function setSpotifyId($info)
    {
        $this->spotifyId = $info['value'];
        if ($info['value']) {
            $tempSpotify = Spotify::track($this->spotifyId)->get();
            $this->title = $tempSpotify['name'];
            $artistSpotify = $tempSpotify['artists'][0];
            $this->artist = Artist::where('spotifyId', $artistSpotify['id'])->firstOrCreate([
                'name' => $artistSpotify['name'],
                'slug' => Str::slug($artistSpotify['name'], '-'),
                'spotifyId' => $artistSpotify['id']
            ]);
            $this->emit('artistBeforeTitle', $this->artist->id);
        } else {
            $this->emit('artistBeforeTitle', null);
        }
        $this->updated('title');
        $this->updated('spotifyId');
    }

    public function updatedTagTerm()
    {
        $this->tagOptions = Tag::whereLike('name', $this->tagTerm)->get();
    }

    public function clearTagSearch()
    {
        $this->tagTerm = null;
    }

    public function addTag($tag)
    {

    }

    public function updated($field)
    {
        $this->prepare();

        $this->validateOnly($field, [
            'title' => ['required', 'min:3', 'max:255'],
            'text' => ['required'],
            'spotifyId' => ['unique:songs,spotifyId', new SpotifyId],
            'youtubeId' => ['unique:songs,youtubeId', new YoutubeId],
            'deezerId' => ['unique:songs,deezerId', new DeezerId],
            'soundcloudId' => ['unique:songs,soundcloudId', new SoundcloudId],
//            'tags.tag' => ['exists:tags,id', 'min:2'],
//            'isVerified' => false,
            'key' => ['required', new KeyOK],
//            'artistId' => ['exists:artists']
        ]);


    }

    public function mount()
    {

    }

    public function prepare()
    {
        $this->title = ucfirst($this->title);
    }

    public function render()
    {
        return view('livewire.create-song');
    }
}
