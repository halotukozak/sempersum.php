<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DeezerId implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {

        $headers = get_headers('https://api.deezer.com/oembed?url=https://www.deezer.com/track/' . $value);

        if (!strpos($headers[0], '200')) {
            return false;
        }
        return true;

    }

    public function message()
    {
        return 'Nie ma takiej piosenki w Deezer';
    }
}
