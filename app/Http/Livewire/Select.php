<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select extends Component
{

    public $name;
    public $value;
    public $options;
    public $selectedOption;
    public $disabled;
    public $placeholder;

    public function mount($name, $options, $disabled = null, $placeholder = "Wybierz")
    {
        $this->name = $name;
        $this->options = $options;
        $this->disabled = $disabled;
        $this->placeholder = $placeholder;
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

    public function selectOption($option)
    {
        $this->selectedOption = $option;
        $this->selectValue($option);
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

    public function render()
    {
        if ($this->selectedOption == null) {
            $this->selectedOption = $this->placeholder;
        }
        return view('livewire.select');
    }
}
