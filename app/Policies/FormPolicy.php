<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class FormPolicy
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

    public function index(User $user)
    {
        return $user->hasAccess(['index-form']);
    }

    public function show(User $user)
    {
        return $user->hasAccess(['show-form']);
    }

    public function create(User $user)
    {
        return $user->hasAccess(['create-form']);
    }

    public function edit(User $user)
    {
        return $user->hasAccess(['edit-form']);
    }
}
