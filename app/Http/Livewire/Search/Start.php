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

    public int $limit = 10;

    public function loadMore()
    {
        $this->limit += 10;
        $this->updatedTerm();
    }

    public function mount()
    {
        $this->resetBar();
        if ($this->term = request('search')) {
            $this->term = request('search');
            $this->updatedTerm();
        }
    }

    public function resetBar()
    {
        $this->songs = collect();
        $this->term = "";
        $this->limit = 10;

    }

    public function updatedTerm()
    {
        $this->limit = 10;
        $this->generateSongs();
    }

    public function generateSongs(): void
    {
        $this->songs = Song::search($this->term)
            ->withLikes()
            ->limit($this->limit)
            ->get();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search.start');
    }

}
