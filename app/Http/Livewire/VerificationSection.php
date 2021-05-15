<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class VerificationSection extends Component
{
    public Collection $songs;

    public function verify($songId): void
    {
        Song::find($songId)->verify();
    }


    public function mount()
    {
        current_user()->isModerator ?: abort(401);

    }

    public function render()
    {
        return view('livewire.verification-section',
            ['songs' => $this->songs = Song::where('isVerified', false)
                ->get()]);
    }
}
