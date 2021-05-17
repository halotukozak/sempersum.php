<?php

namespace App\Http\Livewire\Profile;

use App\Models\Report;
use Livewire\Component;

class ArtistForm extends Component
{
    public $input;

    public function send()
    {
        $this->validate([
            'input' => 'required'
        ]);

        Report::create(['subject' => 'Przypisanie artysty do konta.',
            "body" => "Użytkownik: " . current_user()->name . " Id: " . current_user()->id . " prosi o przypisanie artysty. Dane do uwierzytelnienia: " . $this->input,
            "user_id" => current_user()->id
        ]);

        $this->emit('saved');

    }

    public function render()
    {
        return view('livewire.profile.artist-form');
    }
}
