<?php

namespace App\Http\Livewire\Search;

use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;

class Bar extends Component
{
    use WithPagination;

    public $term = "";
    public $songs = [];
    public $highlightIndex = 0;
    public $barId;

    public function mount()
    {
        $this->resetBar();
        $this->barId = rand();
    }

    public function resetBar()
    {
        $this->songs = [];
        $this->term = '';
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->songs) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->songs) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectSong()
    {
        $song = $this->songs[$this->highlightIndex] ?? null;
        if ($song) {
            $this->redirect($song->path());
        }
    }

    public function updatedTerm()
    {
        $this->songs = Song::search($this->term)
            ->get();
    }

    public function render()
    {
        return view('livewire.search.bar');
    }
}
