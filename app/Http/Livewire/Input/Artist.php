<?php

namespace App\Http\Livewire\Input;

use App\Models\Artist as ArtistModel;
use Livewire\Component;
use Livewire\WithPagination;


class Artist extends Component
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

    public function mount($name, $disabled = false, $spotifyId = null)
    {
        $this->name = $name;
        $this->allOptions = ArtistModel::all();
        $this->options = $this->options();
        $this->disabled = $disabled;
        $this->artistBeforeTitle($spotifyId);
    }

    public function artistBeforeTitle($info)
    {
        if ($info) {
            $this->selectOption($info);
            $this->disabled = true;
        } else {
            $this->selectOption($info);
            $this->disabled = false;
        }
    }

    public function updatedTerm()
    {
        $this->options = $this->options($this->term);
    }

    public function options($term = null)
    {
        if ($term) {
            $options = ArtistModel::whereLike('name', $term)->get();
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
        if ($optionId) {
            $option = ArtistModel::find($optionId);
            $this->selectedOption = $option;
            $this->selectValue($option->id);
        } else {
            $this->selectedOption = null;
            $this->selectValue(null);
        }
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

        return view('livewire.input.artist');
    }
}
