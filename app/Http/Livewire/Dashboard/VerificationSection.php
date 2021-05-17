<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class VerificationSection extends Component
{
    public Collection $songs;

    public function verify($songId): void
    {
        $song = Song::find($songId);
        if (current_user()->can('verify', $song))
            $song->verify();
    }

    public function render()
    {
        return view('livewire.verification-section',
            ['songs' => $this->songs = Song::limit(10)
                ->where('isVerified', false)
                ->where(function ($query) {
                    if (!current_user()->isModerator) {
                        $query->whereIn('artist_id', current_user()->artist->pluck('id')->toArray());
                    }
                })
                ->get()]);
    }
}
