<?php

namespace App\Policies;

use App\Place;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PlacePolicy
{
    use HandlesAuthorization;

    /**
     * Don't check permissions for admin
     *
     * @param $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if (Auth::user()->role->name === 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAll(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the list of own places
     *
     * @param  \App\User  $user
     * @param  \App\user  $model
     * @return mixed
     */
    public function viewOwn(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Account  $model
     * @return mixed
     */
    public function view(User $user, Place $model)
    {
        return $user->id === (int)$model->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @param  \App\Account  $model
     * @return mixed
     */
    public function create(User $user, Place $model)
    {
        return $user->id === (int)$model->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Account  $model
     * @return mixed
     */
    public function update(User $user, Place $model)
    {
        return $user->id === (int)$model->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Account  $model
     * @return mixed
     */
    public function delete(User $user, Place $model)
    {
        return $user->id === (int)$model->user_id;
    }
}
