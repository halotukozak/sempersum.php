<?php

namespace App\Http\Livewire\Search;

use App\Models\Likable;
use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;

class Start extends Component
{
    use Likable;
    use WithPagination;

    public $term = "";
    public $songs;

    public function mount()
    {
        $this->resetBar();
        $this->term = request('search');
    }

    public function resetBar()
    {
        $this->songs = null;
        $this->term = "";
    }

    public function updatedTerm()
    {
        $this->songs = Song::search($this->term)
            ->withLikes()
            ->get();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search.start');
    }
}
