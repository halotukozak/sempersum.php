<?php

namespace App\Http\Livewire;

use App\Models\Likable;
use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;

class SearchingBar extends Component
{
    use Likable;
    use WithPagination;

    public $term = "";
    public $songs = [];
    public $highlightIndex = 0;

    public function mount()
    {
        $this->resetBar();
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
            $this->redirect(route('song', $song['slug']));
        }
    }

    public function updatedTerm()
    {
        $this->songs = Song::where('title', 'like', '%' . $this->term . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.searching-bar');
    }
}
