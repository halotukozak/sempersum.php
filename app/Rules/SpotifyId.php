<?php

namespace App\Rules;

use Aerni\Spotify\Exceptions\SpotifyApiException;
use Illuminate\Contracts\Validation\Rule;
use Spotify;

class SpotifyId implements Rule
{
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

    public function message()
    {
        return 'Nie ma takiej piosenki w Spotify';
    }
}
