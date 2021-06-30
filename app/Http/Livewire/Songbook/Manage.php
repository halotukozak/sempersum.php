<?php

namespace App\Http\Livewire\Songbook;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Songbook;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class Manage extends Component
{
    public Songbook $songbook;

    public string $name = '';
    public string $password = '';
    public string $password_confirmation = '';
    public array $users = [];
    public array $songs = [];

    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:256',
            'password' => ['required', 'string', new Password, 'confirmed']
        ];
    }

    public function mount($songbook = null): void
    {

    }

    public function updated()
    {
        $this->validate($this->rules());

    }

    public function submit()
    {
        $this->validate($this->rules());
        dd('git');
    }

    public function render()
    {
        return view('livewire.songbook.manage');
    }
}
