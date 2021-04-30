<?php

namespace App\Http\Livewire\Spotify;

use Spotify;
use Livewire\Component;
use Livewire\WithPagination;

class SongSearch extends Component
{
    use WithPagination;

    public $name;

    public $value = '';
    public $optionsValues;
    public $allOptions;

    public $term;

    public $options;
    public $emptyOptions;
    public $isSearching;
    public $selectedOption;

    public $playingSong = null;

    protected $listeners = [
        'play' => 'play',
        'stop' => 'stop',];

    public function play($id = null)
    {
        $this->playingSong = $id;
    }

    public function stop()
    {
        $this->play();
    }


    public function mount($name)
    {
        $this->name = $name;
        $this->allOptions = [];
        $this->options = $this->options();
    }

    public function updatedTerm()
    {
        $this->options = $this->options($this->term);
    }

    public function options($term = null)
    {
        if ($term) {
            $options = Spotify::searchTracks($term)->limit(10)->get('tracks')['items'];
            if ($options == []) {
                return null;
            }
            return $options;
        } else
            return null;
    }

    public function selectedOption($value)
    {
        return null;
    }

    public function notifyValueChanged()
    {
        $this->emit("{$this->name}Updated", [
            'name' => $this->name,
            'value' => $this->value,
        ]);
    }

    public function selectOption($optionId)
    {
        $option = Spotify::track($optionId)->get();
        $this->selectedOption = $option;
        $this->selectValue($option['id']);
    }

    public function selectValue($value)
    {
        $this->value = $value;
        if ($this->value == null) {
            $this->emit('livewire-select-focus-search', ['name' => $this->name]);
        }

        if ($this->value != null) {
            $this->emit('livewire-select-focus-selected', ['name' => $this->name]);
        }

        $this->notifyValueChanged();
    }

    public function updatedValue()
    {
        $this->selectValue($this->value);
    }

    public function isSearching(): bool
    {
        return !empty($this->term);
    }

    public function isEmpty(): bool
    {
        if ($this->options && count($this->options) > 0) {
            return false;
        } else
            return true;
    }

    public function render()
    {
        $this->isSearching = !empty($this->term);
        $this->emptyOptions = $this->isEmpty();

        return view('livewire.spotify.song-search');
    }

}
