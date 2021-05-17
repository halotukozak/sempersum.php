<?php


namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function verify(User $user): bool
    {
        return (bool) $user->artist->count() || $user->isModerator;
    }
}
