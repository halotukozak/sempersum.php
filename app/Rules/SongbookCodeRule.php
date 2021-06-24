<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SongbookCodeRule implements Rule
{
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value) :bool
    {
        return empty(current_user()->songbooks->where('code', $value)->count());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Masz już dostęp do tego śpiewnika.';
    }
}
