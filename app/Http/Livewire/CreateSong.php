<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Tag;
use Illuminate\Support\Collection;
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
    public string $title = "";
    public string $text = "";
    public $spotifyId;
    public string $deezerId = "";
    public string $youtubeId = "";
    public string $soundcloudId = "";
    public string $key = "";
    public $artist;
    public Collection $tags;
    public bool $isVerified = false;

    public array $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];
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
        foreach ($this->tags as $tag) {
            $this->tagOptions = $this->tagOptions->where('name', '!=', $tag['name']);
        }
    }

    public function clearTagSearch()
    {
        $this->tagTerm = null;
        $this->tagOptions = null;
    }

    public function addTag($tag)
    {
        $tag = Tag::firstWhere('name', $tag);
        $this->tags->push($tag);
        $this->clearTagSearch();
    }

    public function removeTag($tag)
    {
        $this->tags = $this->tags->whereNotIn('id', $tag);
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
            'tags.tag' => ['exists:tags,id', 'min:2'],
//            'isVerified' => false,
            'key' => ['required', new KeyOK],
//            'artistId' => ['exists:artists']
        ]);


    }

    public function mount()
    {
        $this->tags = collect();
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
