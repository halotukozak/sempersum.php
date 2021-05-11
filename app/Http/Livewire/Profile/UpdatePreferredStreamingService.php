<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePreferredStreamingService extends Component
{
    public $state = [];
    public $options = [
        ['value' => 'soundcloud', 'name' => 'SoundCloud'],
        ['value' => 'deezer', 'name' => 'Deezer',],
        ['value' => 'spotify', 'name' => 'Spotify'],
        ['value' => 'youtube', 'name' => 'YouTube']
    ];

    public function updateProfileInformation()
    {
        $this->resetErrorBag();


        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('profile.update-preferred-streaming-service');
    }
}
