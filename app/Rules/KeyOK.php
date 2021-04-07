<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class KeyOK implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return in_array($value, ['Ab', 'A', 'A#', 'Bb', 'B', 'C', 'C#', 'Db', 'D','D#', 'Eb', 'E', 'F', 'F#', 'Gb', 'G', 'G#']);
    }


    public function message()
    {
        return 'Niepoprawny klucz.';
    }
}
