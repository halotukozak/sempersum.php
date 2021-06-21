<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Songbook;
use App\Rules\SongbookPasswordRule;
use Livewire\Component;

class SongbooksSection extends Component
{
    public string $password = "";
    public $songbooks;

    protected $listeners = [
        'ref' => '$refresh'
    ];

    protected function rules(): array
    {
        return [
            'password' => ['integer', 'required', 'digits:8', 'exists:songbooks', new SongbookPasswordRule()]
        ];
    }

    public function messages(): array
    {
        return [
            'password.integer' => 'Poprawne hasło nie zawiera liter i znaków specjalnych.',
            'password.required' => 'Najpierw wpisz hasło.',
            'password.digits' => 'Poprawne hasło składa się z 8 cyfr.',
            'password.exists' => 'Nie mamy takiego hasła w bazie.',
        ];
    }

    public function updatedPassword()
    {
        $this->validate($this->rules());
    }

    public function loadSongbooks(): void
    {

        $this->songbooks = current_user()->songbooks;

    }

    public function add()
    {
        $this->validate($this->rules());
        current_user()->songbooks()->attach(Songbook::where('password', $this->password)->first('id')->id);
        $this->songbooks->push(Songbook::where('password', $this->password)->first());
        $this->password = "";
    }

    public function mount()
    {
        $this->loadSongbooks();
    }

    public function render()
    {
        return view('livewire.dashboard.songbooks-section');
    }
}
