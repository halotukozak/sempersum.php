<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TagsSelect extends Component
{
    public function tagsUpdate($tags)
    {
        $this->emit('tagsUpdated', $tags);
    }

    public function render()
    {
        return view('livewire.tags-select');
    }
}
