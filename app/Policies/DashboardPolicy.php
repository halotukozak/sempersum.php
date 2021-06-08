<?php


namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function verify(User $user): bool
    {
        return $user->isModerator || ($user->artist && $user->artist->count());
    }

    public function manageArtist(User $user): bool
    {
        return $user->artist && $user->artist->count();
    }
}
