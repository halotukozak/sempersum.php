<?php

namespace App\Http\Livewire\Songbook;

use App\Models\Songbook;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use Livewire\WithFileUploads;

class Manage extends Component
{
//    use WithFileUploads;
//
//    public $photo;
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
            'password' => ['required', 'string', new Password, 'confirmed'],
//            'photo' => 'image|max:2048'
        ];
    }

    public function mount($songbook = null): void
    {

    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules());
//        if ($field == 'photo') {
//            $this->photo->storeAs('songbookImages', $this->songbook->id);
//        }
    }

    public function submit()
    {
        $this->validate($this->rules());
    }

    public function render()
    {
        return view('livewire.songbook.manage');
    }
}
