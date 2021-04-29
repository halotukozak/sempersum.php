<?php

namespace App\Rules;

use Aerni\Spotify\Exceptions\SpotifyApiException;
use Illuminate\Contracts\Validation\Rule;
use Spotify;

class SpotifyId implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
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
    public function passes($attribute, $value)
    {
        if ($value) {
            try {
                Spotify::track($value)->get();
            } catch (SpotifyApiException $e) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nie ma takiej piosenki w Spotify';
    }
}
