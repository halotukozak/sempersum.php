<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use Livewire\Component;
use Livewire\WithPagination;


class ArtistSelect extends Component
{
    use WithPagination;

    public $term = "";
    public $artists = [];
    public $highlightIndex = 0;

    public function mount()
    {
        $this->resetBar();
    }

    public function resetBar()
    {
        $this->artists = [];
        $this->term = '';
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->artists) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->artists) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectArtist()
    {
        $artist = $this->artists[$this->highlightIndex] ?? null;
        if ($artist) {
//
        }
    }

    public function updatedTerm()
    {
        $this->artists = Artist::where('name', 'like', '%' . $this->term . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.artist-select');
    }
}
