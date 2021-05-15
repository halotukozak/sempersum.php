<?php

namespace App\Http\Livewire\Song;

use App\Models\Artist;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Rules\DeezerId;
use App\Rules\KeyOK;
use App\Rules\SoundcloudId;
use App\Rules\SpotifyId;
use App\Rules\YoutubeId;
use Illuminate\Support\Str;
use App\Models\Song as SongModel;
use Spotify;

class Create extends Component
{
    public bool $choice = false;
    public ?int $idSong = null;

    public string $title = "";
    public string $text = "";
    public ?string $spotifyId;
    public ?string $deezerId = "";
    public ?string $youtubeId = "";
    public ?string $soundcloudId = "";
    public ?string $key = "";
    public ?Artist $artist;
    public Collection $tags;
    public bool $isVerified = false;

    public array $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];
    public ?string $tagTerm;
    public ?array $tagOptions;

    protected $listeners = ['artistUpdated' => 'setArtist',
        'spotifyIdUpdated' => 'setSpotifyId',
        'keyUpdated' => 'setKey',
        'tagsUpdated' => 'setTag',
        'deezerIdUpdated' => 'setDeezerId'
    ];

    protected function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'text' => ['required'],
            'spotifyId' => ['nullable', Rule::unique('songs', 'spotifyId')->ignore($this->idSong), new SpotifyId],
            'youtubeId' => ['nullable', 'unique:songs,youtubeId,' . $this->idSong, new YoutubeId],
            'deezerId' => ['nullable', 'unique:songs,deezerId,' . $this->idSong, new DeezerId],
            'soundcloudId' => ['nullable', 'unique:songs,soundcloudId,' . $this->idSong, new SoundcloudId],
            'tags.tag' => ['nullable', 'exists:tags,id', 'min:2'],
            'key' => ['required', new KeyOK],
        ];
    }

    public function dashboard(): RedirectResponse
    {
        return redirect()->route('dashboard');
    }

    public function save(): void
    {
        $this->validate($this->rules());
        $this->add();
        $this->choice = true;
    }

    public function add(): void
    {
        if (!$this->artist) {
            $this->artist = new Artist(['id' => null]);
        }
        $newSong = new SongModel([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'text' => $this->text,
            'spotifyId' => $this->spotifyId,
            'youtubeId' => $this->youtubeId,
            'deezerId' => $this->deezerId,
            'soundCloudId' => $this->soundcloudId,
            'key' => $this->key,
            'artist_id' => $this->artist->id,
            'isVerified' => false,
            'isOutOfDate' => false,
        ]);

        $newSong->idSong = $newSong->id;
        if ($this->idSong) {
            $newSong->idSong = $this->idSong;
        }

        $newSong->save();
        $newSong->tags()->attach($this->tags->pluck('id'));
    }

    public function refresh(): void
    {
        $this->choice = false;
        $this->title = "";
        $this->text = "";
        $this->spotifyId = null;
        $this->deezerId = "";
        $this->youtubeId = "";
        $this->soundcloudId = "";
        $this->key = "";
        $this->artist = null;
        $this->tags = collect();
        $this->isVerified = false;
        $this->tagTerm = '';
        $this->tagOptions = [];
    }

    public function setDeezerId($info): void
    {
        $this->deezerId = $info;
        $this->updated('deezerId');
    }

    public function setKey($info): void
    {
        $this->key = $info['value'];
    }

    public function setArtist($info): void
    {
        $this->artist = Artist::find($info['value']);
    }

    public function setSpotifyId($info): void
    {
        $this->spotifyId = $info['value'];
        if ($info['value']) {
            $tempSpotify = Spotify::track($this->spotifyId)->get();
            $this->title = $tempSpotify['name'];
            $artistSpotify = $tempSpotify['artists'][0];
            $this->artist = Artist::where('spotifyId', $artistSpotify['id'])->firstOrCreate([
                'name' => $artistSpotify['name'],
                'slug' => Str::slug($artistSpotify['name']),
                'spotifyId' => $artistSpotify['id']
            ]);
            $this->emit('artistBeforeTitle', $this->artist->id);
        } else {
            $this->emit('artistBeforeTitle', null);
        }
        $this->updated('title');
        $this->updated('spotifyId');
    }

    public function updatedTagTerm(): void
    {
        $this->tagOptions = Tag::whereLike('name', $this->tagTerm)->get();
        foreach ($this->tags as $tag) {
            $this->tagOptions = $this->tagOptions->where('name', '!=', $tag['name']);
        }
    }

    public function clearTagSearch(): void
    {
        $this->tagTerm = null;
        $this->tagOptions = null;
    }

    public function addTag($tag): void
    {
        $tag = Tag::firstWhere('name', $tag);
        $this->tags->push($tag);
        $this->clearTagSearch();
    }

    public function removeTag($tag): void
    {
        $this->tags = $this->tags->whereNotIn('id', $tag);
    }

    public function updated($field): void
    {
        $this->prepare();
        $this->validateOnly($field, $this->rules());
    }

    public function mount()
    {
        $song = request('song');
        if ($song) {
            $song = SongModel::firstWhere('slug', $song);
            if (!$song) {
                abort(404);
            }
            $this->title = $song->title;
            $this->text = $song->text;
            $this->spotifyId = $song->spotifyId;
            $this->deezerId = $song->deezerId;
            $this->youtubeId = $song->youtubeId;
            $this->soundcloudId = $song->soundcloudId;
            $this->key = $song->key;
            $this->artist = $song->artist;
            $this->tags = $song->tags;
            $this->idSong = $song->id;
        } else $this->tags = collect();
    }

    public function prepare(): void
    {
        $this->title = ucfirst($this->title);
    }

    public function render()
    {
        return view('livewire.song.create');
    }
}