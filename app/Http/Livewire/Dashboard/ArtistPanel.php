<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Artist;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ArtistPanel extends Component
{
    public ?Artist $artist;
    public $name;
    public $description;
    public $website;
    public $facebook;
    public $instagram;
    public $spotify;
    public $youtube;
    public $soundcloud;
    public $deezer;
    public $email;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['nullable'],
            'spotify' => ['nullable', Rule::unique('artists', 'spotify')->ignore($this->artist->id)],
            'youtube' => ['nullable', Rule::unique('artists', 'youtube')->ignore($this->artist->id)],
            'deezer' => ['nullable', Rule::unique('artists', 'deezer')->ignore($this->artist->id)],
            'soundcloud' => ['nullable', Rule::unique('artists', 'soundcloud')->ignore($this->artist->id)],
            'website' => ['nullable', 'url'],
            'email' => ['nullable', 'email']
        ];
    }

    public function mount(int $artistId)
    {
        $this->artist = Artist::find($artistId);
        $this->name = $this->artist->name;
        $this->description = $this->artist->description;
        $this->website = $this->artist->website;
        $this->facebook = $this->artist->facebook;
        $this->instagram = $this->artist->instagram;
        $this->spotify = $this->artist->spotify;
        $this->youtube = $this->artist->youtube;
        $this->soundcloud = $this->artist->soundcloud;
        $this->deezer = $this->artist->deezer;
        $this->email = $this->artist->email;
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules());
    }

    public function save()
    {
        $this->validate($this->rules());
        $this->artist->update([
            'name' => $this->name,
            'description' => $this->description,
            'website' => $this->website,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'spotify' => $this->spotify,
            'youtube' => $this->youtube,
            'soundcloud' => $this->soundcloud,
            'deezer' => $this->deezer,
            'email' => $this->email,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.artist-panel');
    }
}
