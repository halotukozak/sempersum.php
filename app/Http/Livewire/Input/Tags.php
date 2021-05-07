<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;

class Tags extends Component
{
    public function tagsUpdate($tags)
    {
        $this->emit('tagsUpdated', $tags);
    }

    public function render()
    {
        return view('livewire.input.tags');
    }
}
