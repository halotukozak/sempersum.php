<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;

class Select extends Component
{

    public $name;
    public $value;
    public $options;
    public $selectedOption;
    public $disabled;
    public $placeholder;

    public function mount($name, $options, $disabled = null, $placeholder = "Wybierz...", $default = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->selectOption($default);
                if ($this->selectedOption == null) {
            $this->selectedOption = $this->placeholder;
        }
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
            $this->emit('livewire.input.select-focus-search', ['name' => $this->name]);
        }

        if ($this->value != null) {
            $this->emit('-focus-selected', ['name' => $this->name]);
        }

        $this->notifyValueChanged();
    }

    public function updatedValue()
    {
        $this->selectValue($this->value);
    }

    public function render()
    {
        return view('livewire.input.select');
    }
}