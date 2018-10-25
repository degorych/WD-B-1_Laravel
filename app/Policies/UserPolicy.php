<?php

namespace App\Policies;

use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function isNotBlocked(User $user) {
        return $user->isNotBlocked();
    }

    public function show(User $user)
    {
        return $user->hasAccess(['show-user-info']);
    }

    public function update(User $user)
    {
        return $user->hasAccess(['update-user-info']);
    }
}
