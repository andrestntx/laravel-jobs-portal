<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 5/21/16
 * Time: 4:03 PM
 */

namespace App\Policies;


use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function account(User $user, User $model)
    {
        if($user->id == $model->id){
            return true;
        }
    }

    /**
     * @param User $user
     * @param User $model
     * @return bool
     */
    public function isJobseeker(User $user, User $model)
    {
        if($user->id == $model->id && $user->jobseeker && ! is_null($user->activated_at)) {
            return true;
        }
    }

}