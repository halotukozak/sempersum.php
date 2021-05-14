<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class VerificationSection extends Component
{
    public $songs;

    public function mount(){
        current_user()->isModerator ? : abort(401);
        $this->songs = Song::where('isVerified', false)
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.verification-section');
    }
}
