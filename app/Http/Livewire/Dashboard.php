<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public string $page = 'default';

    public function show(string $page = 'default')
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
