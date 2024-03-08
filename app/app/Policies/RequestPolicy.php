<?php

namespace App\Policies;

use App\Request;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the request.
     *
     * @param  \App\User  $user
     * @param  \App\Request  $request
     * @return mixed
     */
    public function view(User $user, Request $request)
    {
        //
    }

    /**
     * Determine whether the user can create requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the request.
     *
     * @param  \App\User  $user
     * @param  \App\Request  $request
     * @return mixed
     */
    public function update(User $user, Request $request)
    {
        //
    }

    /**
     * Determine whether the user can delete the request.
     *
     * @param  \App\User  $user
     * @param  \App\Request  $request
     * @return mixed
     */
    public function delete(User $user, Request $request)
    {
        //
    }

    /**
     * Determine whether the user can restore the request.
     *
     * @param  \App\User  $user
     * @param  \App\Request  $request
     * @return mixed
     */
    public function restore(User $user, Request $request)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the request.
     *
     * @param  \App\User  $user
     * @param  \App\Request  $request
     * @return mixed
     */
    public function forceDelete(User $user, Request $request)
    {
        //
    }
}
