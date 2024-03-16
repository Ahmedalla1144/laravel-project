<?php


namespace app\Traits;

use Illuminate\Support\Facades\Auth;

trait Policy
{
    function checkUserAbilitis($ability): bool
    {

        $userAbility = Auth::user()->roles;

        if (count(array_intersect($userAbility, $ability)) > 0) {
            return true;
        }

        return false;
    }
}
