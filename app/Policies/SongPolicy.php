<?php

namespace App\Policies;

use App\Models\Song;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SongPolicy
{
    public function verify(User $user, Song $song)
    {
        return $user->artist->contains($song->artist);
    }

}