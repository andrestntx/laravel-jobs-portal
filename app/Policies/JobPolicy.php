<?php

namespace App\Policies;

use App\Entities\Job;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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
     * @param Job $job
     * @return bool
     */
    public function edit(User $user, Job $job)
    {
        if($user->id == $job->company->user_id) {
            return true;
        }
    }

}
