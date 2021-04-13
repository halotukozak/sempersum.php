<?php

namespace App\Http\Livewire;

use App\Models\Likable;
use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;

class Searching extends Component
{
    use Likable;
    use WithPagination;

    public $term = "";
    public $songs = [];

    public function mount()
    {
        $this->resetBar();
        $this->term = request('search');
    }

    public function resetBar()
    {
        $this->songs = [];
        $this->term = "";
    }

    public function updatedTerm()
    {
        $this->songs = Song::where('title', 'like', '%' . $this->term . '%')
            ->withLikes()
            ->get()
            ->toArray();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.searching', [
            'songs' => $this->songs = Song::where('title', 'like', '%' . $this->term . '%')
                ->withLikes()
                ->get(),
        ]);
    }
}
