<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 8:03 PM
 */

namespace App\Policies;


use App\Entities\Study;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudyPolicy
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
     * @param Study $study
     * @return bool
     */
    public function destroy(User $user, Study $study)
    {
        if($user->id == $study->resume->jobseeker_id){
            return true;
        }
    }
}