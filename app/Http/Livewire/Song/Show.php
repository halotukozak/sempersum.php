<?php

namespace App\Http\Livewire\Song;

use App\Models\Song as Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\ConfirmsPasswords;
use Livewire\Component;

class Show extends Component
{
    public $song;
    public int $likes = 0;
    public bool $liked;
    public int $preferred_streaming_service = 3;
    public array $keys = ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D', 'D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#'];

    use ConfirmsPasswords;

    public function mount($song)
    {
        if (current_user() && current_user()->isModerator) {
            $this->song = Model::withTrashed()->withLikes()->firstWhere('slug', $song);
        } else {
            $this->song = Model::withLikes()->firstWhere('slug', $song);
        }
        abort_if($this->song === null, 404);

        $this->liked = $this->song->isLikedBy(current_user());

        if ($this->song->likes) {
            $this->likes = $this->song->likes;
        }

        $this->preferred_streaming_service();

    }

    public function like()
    {
        if (current_user()) {
            if ($this->liked) {
                $this->song->dislike();
                $this->likes--;
                $this->liked = false;
            } else {
                $this->song->like();
                $this->likes++;
                $this->liked = true;
            }
        } else {
            $this->redirect(route('login'));
        }
    }

    public function verify(): void
    {
        $this->song->verify();
    }

    public function delete(): void
    {
        $this->ensurePasswordIsConfirmed();
        $this->song->delete();
        $this->redirectRoute('dashboard');
    }

    public function restore(): void
    {
        $this->ensurePasswordIsConfirmed();
        $this->song->restore();
    }

    protected function preferred_streaming_service()
    {
        if (current_user()) {
            switch (current_user()->preferred_streaming_service) {
                case ('youtube'):
                    $this->preferred_streaming_service = 1;
                    break;
                case ('spotify'):
                    $this->preferred_streaming_service = 2;
                    break;
                case ('deezer'):
                    $this->preferred_streaming_service = 4;
                    break;
                case ('soundcloud'):
                default:
                    $this->preferred_streaming_service = 3;
                    break;
            }
        } else $this->preferred_streaming_service = 3;

    }

    public function render()
    {
        return view('livewire.song.show');
    }
}
