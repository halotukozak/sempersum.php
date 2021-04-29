<?php

namespace App\Rules;

use Alaouy\Youtube\Rules\ValidYoutubeVideo;

class YoutubeId extends ValidYoutubeVideo
{
    public function message()
    {
        return 'Nie ma takiej piosenki w YouTube.';
    }
}
