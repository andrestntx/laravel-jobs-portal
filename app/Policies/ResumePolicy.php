<?php

namespace App\Policies;

use App\Entities\Resume;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResumePolicy
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
     * @return bool
     */
    public function create(User $user)
    {
        $jobseeker = $user->jobseeker;

        if(!$jobseeker || $jobseeker->resumes()->count() == 0){
            return true;
        }
    }

    /**
     * @param User $user
     * @param Resume $resume
     * @return bool
     */
    public function edit(User $user, Resume $resume)
    {
        return $user->id == $resume->jobseeker_id;
    }
}
