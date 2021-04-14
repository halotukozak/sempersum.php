<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select extends Component
{
    public $name;
    public $options = [];
    public $readable;
    public $model;

//    public function mount($name, $options)
//    {
//        $this->name = $name;
//        $this->options = $options;
//    }


    public function render()
    {
        return view('livewire.select');
    }
}
