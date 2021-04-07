<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SoundcloudLink implements Rule
{

    public function __construct()
    {

    }

    public function passes($attribute, $value)
    {

        $headers = get_headers('https://soundcloud.com/oembed?url=' . $value);

        if (!strpos($headers[0], '200')) {
            return false;
        }
        return true;

    }

    public function message()
    {
        return 'Nie ma takiej piosenki w SoundCloud';
    }
}
