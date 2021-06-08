<?php

namespace App\Http\Livewire\Search;

use App\Models\Likable;
use App\Models\Song;
use Illuminate\Support\Collection;
use Livewire\Component;

class Start extends Component
{
    use Likable;

    public string $term = "";
    public ?Collection $songs;
    public string $tagTerm = "";

    public int $limit = 10;

    public function loadMore()
    {
        $this->limit += 10;
        $this->generateSongs();
    }

    public function mount()
    {
        $this->resetBar();
        if (request('search')) {
            $this->term = (string)request('search');
            $this->updatedTerm();

        } elseif (request('tag')) {
            $this->tagTerm = (string)request('tag');
            $this->generateSongs();
        }

    }

    public function resetBar()
    {
        $this->songs = collect();
        $this->term = "";
        $this->tagTerm = "";
        $this->limit = 10;

    }

    public function updatedTerm()
    {
        $this->tagTerm = "";
        $this->limit = 10;
        $this->generateSongs();
    }

    public function generateSongs(): void
    {
        if ($this->tagTerm) {
            $this->songs = Song::where('isOutOfDate', false)->where('isVerified', true)->withLikes()->whereHas('tags', function ($q) {
                $q->where('name', $this->tagTerm);
            })->limit($this->limit)
                ->get();
        } else {
            $this->songs = Song::search($this->term)
                ->withLikes()
                ->limit($this->limit)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.search.start');
    }

}
