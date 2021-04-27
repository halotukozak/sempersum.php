<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
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
    public $tags;
    public $isVerified;

    public $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];

    protected $listeners = ['artistUpdated' => 'setArtist',
        'spotifyIdUpdated' => 'setSpotifyId',
        'keyUpdated' => 'setKey',
        'tagsUpdated' => 'setTag'
    ];

    public function addSong()
    {
        return;
        $this->validate([

        ]);
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

    public function updated($field)
    {
        $this->prepare();

        $this->validateOnly($field, [
            'title' => ['required', 'min:3', 'max:255'],
            'text' => ['required'],
            'spotifyId' => ['unique:songs,spotifyId', new SpotifyId],
            'youtubeId' => ['unique:songs,youtubeId', new YoutubeId],
            'deezerId' => ['unique:songs,deezerId', new DeezerId],
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

    protected function youtube_id_from_url($url)
    {
        $pattern =
            '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x';
        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return $url;
    }

    protected function deezer_id_from_url($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $html = curl_exec($ch);
        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);

        $url = str_replace(["https://deezer.page.link/", "https://www.deezer.com/pl/track/"], "", $url);
        $temporary = strstr($url, '?');
        return str_replace($temporary, "", $url);
    }

    public function prepare()
    {
        $this->title = ucfirst($this->title);

        $this->deezerId = $this->deezer_id_from_url($this->deezerId);
        $this->youtubeId = $this->youtube_id_from_url($this->youtubeId);
    }

    public function render()
    {
        return view('livewire.create-song');
    }
}
