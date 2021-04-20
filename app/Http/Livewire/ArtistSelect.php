<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use Livewire\Component;
use Livewire\WithPagination;


class ArtistSelect extends Component
{
    use WithPagination;

    public $name;

    public $value;
    public $optionsValues;
    public $allOptions;

    public $term;

    public $options;
    public $emptyOptions;
    public $isSearching;
    public $selectedOption;

    public $disabled = false;

    protected $listeners = ['artistBeforeTitle' => 'artistBeforeTitle'];

    public function mount($name, $disabled = false)
    {
        $this->name = $name;
        $this->allOptions = Artist::all();
        $this->options = $this->options();
        $this->disabled = $disabled;
    }

    public function artistBeforeTitle($info)
    {
            $this->selectOption($info);
            $this->disabled = true;
    }

    public function updatedTerm()
    {
        $this->options = $this->options($this->term);
    }

    public function options($term = null)
    {
        if ($term) {
            $options = Artist::whereLike('name', $term)->get();
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
        $option = Artist::find($optionId);
        $this->selectedOption = $option;
        $this->selectValue($option->id);
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

        return view('livewire.artist-select');
    }
}
