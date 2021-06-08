<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;

class Deezer extends Component
{
    public ?string $input;

    protected function prepare()
    {
        $url = $this->input;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->input);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $html = curl_exec($ch);
        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);

        $url = str_replace(["https://deezer.page.link/", "https://www.deezer.com/pl/track/"], "", $url);
        $temporary = strstr($url, '?');
        $this->input = str_replace($temporary, "", $url);
    }

    public function updatedInput()
    {
        $this->prepare();
        $this->emit('deezerIdUpdated', $this->input);
    }

    public function render()
    {
        return view('livewire.input.deezer');
    }
}
