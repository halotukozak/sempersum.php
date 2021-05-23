<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public string $page = 'create';

    public function render()
    {
        return view('livewire.dashboard');
    }
}
