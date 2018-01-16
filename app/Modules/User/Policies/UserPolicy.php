<?php

namespace AnimalProject\Modules\User\Policies;

use AnimalProject\Modules\User\Models\User;

/**
 * Class UserPolicy
 * @package AnimalProject\Modules\User\Policies
 */
class UserPolicy
{
    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create user');
    }

    /**
     * @param User $user
     * @param User $anotherUser
     * @return bool
     */
    public function delete(User $user, User $anotherUser)
    {
        return $user->hasPermissionTo('delete user') && $user->id != $anotherUser->id;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function show(User $user)
    {
        return $user->hasPermissionTo('show user');
    }

    /**
     * @param User $user
     * @param User $anotherUser
     * @return bool
     */
    public function update(User $user, User $anotherUser)
    {
        if ($user->hasRole('admin'))
        {
            return true;
        }

        return $user->hasPermissionTo('update user') && $user->id == $anotherUser->id;
    }
}