<?php

namespace App\Http\Livewire\Songbook;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Songbook;
use Livewire\Component;

class Manage extends Component
{
    public Songbook $songbook;

    public string $name = '';
    public string $password = '';
    public array $users = [];
    public array $songs = [];

    use PasswordValidationRules;


    public function mount($songbook = null) : void
    {

    }

    public function updated()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:256',
            'password' => ['required', $this->passwordRules()]
        ]);

    }

    public function submit()
    {
        dd('git');
    }

    public function render()
    {
        return view('livewire.songbook.manage');
    }
}
