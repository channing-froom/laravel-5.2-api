<?php

namespace App\ApplicationTraits;
use App\Models\Oauth;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class RoleTraits
 *
 * NOTE !
 * These Methods are Examples and not for commercial use
 *
 * @package App\ApplicationTraits
 */
trait RoleTraits {

    /**
     * Return the slug of a user role
     *
     * @param User $user
     * @return mixed
     */
    public static function getRole(User $user)
    {
        return $user->getUserType()->getSlug();
    }

    /**
     * Check for a role, Auto collect the user for login
     *
     * @param array $roles
     * @return bool
     */
    public static function access(array $roles)
    {
        $role = self::getRole(Auth::user());

        if (in_array($role, $roles)) {
            return true;
        }

        return false;
    }

    /**
     * Check for role for selected user
     *
     * @param User $user
     * @param array $roles
     * @return bool
     */
    public static function accessWithUser(User $user, array $roles)
    {
        $role = self::getRole($user);

        if (in_array($role, $roles)) {
            return true;
        }

        return false;
    }

}