<?php

namespace App\Policies;

use App\Models\Songbook;
use App\Models\User;

class SongbookPolicy
{
    public function manage(User $user, Songbook $songbook): bool
    {
        return !empty($user->songbooks->find($songbook));
    }
}
