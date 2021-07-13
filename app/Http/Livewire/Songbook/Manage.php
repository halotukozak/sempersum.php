<?php

namespace App\Http\Livewire\Songbook;

use App\Models\Song;
use App\Models\Songbook;
use Illuminate\Support\Collection;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use Livewire\WithPagination;

//use Livewire\WithFileUploads;

class Manage extends Component
{
//    use WithFileUploads;
//
//    public $photo;
    public Songbook $songbook;
    public string $name = '';
    public string $password = '';
    public string $comment = '';
    public array $users = [];
    public array $songs = [];

    public Collection $searchSongs;
    public string $term = '';
    public int $highlightIndex = 0;


    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:256',
            'password' => ['required', 'string', new Password],
            'comment' => 'string'
//            'photo' => 'image|max:2048'
        ];
    }

    public function mount($songbook = null): void
    {
        if ($songbook) {
            $this->songbook = $songbook;
            if ($songbook->name) $this->name = $songbook->name;
            if ($songbook->comment) $this->comment = $songbook->comment;
            if (!empty($songbook->users)) $this->users = $songbook->users->toArray();
            if (!empty($songbook->songs)) $this->songs = $songbook->songs->toArray();
//            $s->songs->pluck('id')

        }
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
        abort(404);

        return view('livewire.songbook.manage');
    }
}
