<?php


namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function verify(User $user): bool
    {
        if ($user->isModerator) return true;
        if ($user->artist && $user->artist->count())
            return true;
        return false;
    }
}
