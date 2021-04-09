<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YoutubeId implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $headers = get_headers('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $value);

        if (!strpos($headers[0], '200')) {
            return false;
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
        return 'Nie ma takiej piosenki w YouTube';
    }
}