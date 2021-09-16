<?php

namespace App\Http\Livewire\Songbook;

use App\Models\Songbook;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Validator;

class Index extends Component
{
    public Songbook $songbook;
    public string $email = '';

    protected array $messages = ['email.email' => 'To nie jest poprawny adres email.',
        'email.exists' => 'Nie mamy takiego adresu email w bazie.',
    ];

    protected array $rules = ['email' => 'required|email|exists:users,email'];


    public function removeUser(User $user)
    {
        $this->songbook->changePermission($user);
    }

    public function addUser()
    {
        $this->validate($this->rules, $this->messages);
        $this->validate(Rule::notIn(['a@a.pl']));
        $this->songbook->changePermission(User::firstWhere('email', $this->email));
    }

    public function updatedEmail()
    {
        $this->validate([Rule::notIn('a@a.pl')]);

//        $this->validate($this->rules, $this->messages);
    }

    public function render()
    {
        return view('livewire.songbook.index');
    }
}
