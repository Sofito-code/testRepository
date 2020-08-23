<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $clientAuth
     * @return mixed
     */
    public function viewAny(User $clientAuth)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $clientAuth
     * @param  \App\User  $client
     * @return mixed
     */
    public function view(User $clientAuth, User $client)
    {
        return $clientAuth->id === $client->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $clientAuth
     * @return mixed
     */
    public function create(User $clientAuth)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $clientAuth
     * @param  \App\User  $client
     * @return mixed
     */
    public function update(User $clientAuth, User $client)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $clientAuth
     * @param  \App\User  $client
     * @return mixed
     */
    public function delete(User $clientAuth, User $client)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $clientAuth
     * @param  \App\User  $client
     * @return mixed
     */
    public function restore(User $clientAuth, User $client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $clientAuth
     * @param  \App\User  $client
     * @return mixed
     */
    public function forceDelete(User $clientAuth, User $client)
    {
        //
    }
}
