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

    public function updatingTerm()
    {
        $this->render();
    }

    public function render()
    {
        $term = '%' . $this->term . '%';
        return view('livewire.searching', [
            'songs' => $this->songs = Song::where('title', 'like', $term)
                ->withLikes()
                ->paginate(10)
        ]);
    }


}
