<?php

namespace App\Http\Livewire\Songbook;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Songbook;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class Manage extends Component
{
    public Songbook $songbook;

    public string $name = '';
    public int $password;
    public array $users = [];
    public array $songs = [];

    public function mount($songbook)
    {

    }

    public function updated()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:256',
        ]);

    }

    public function render()
    {
        return view('livewire.songbook.manage');
    }
}
