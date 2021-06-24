<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Songbook;
use App\Rules\SongbookCodeRule;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class SongbooksSection extends Component
{
    public string $password = "";
    public string $code = "";

    protected function rules(): array
    {
        return [
            'code' => ['uuid', 'required', 'exists:songbooks', new SongbookCodeRule()],
            'password' => ['required', 'string', new Password]
        ,];
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

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules());
    }


    public function add()
    {
        $this->validate($this->rules());
        current_user()->songbooks()->attach(Songbook::where('code', $this->code)->first('id')->id);
        $this->password = "";
        $this->code = "";
        $this->loadSongbooks();
    }

    public function render()
    {
        return view('livewire.dashboard.songbooks-section')->with('songbooks', current_user()->songbooks);
    }
}
