<?php

namespace App\Policies;

use App\Entities\Job;
use App\Entities\User;
use App\Facades\JobseekerFacade;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    protected $jobseekerFacade;

    /**
     * JobPolicy constructor.
     * @param JobseekerFacade $jobseekerFacade
     */
    public function __construct(JobseekerFacade $jobseekerFacade)
    {
        $this->jobseekerFacade = $jobseekerFacade;
    }


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

    /**
     * @param User $user
     * @param Job $job
     * @return bool
     */
    public function apply(User $user, Job $job)
    {
        if($user->isJobseeker() && ! is_null($user->activated_at) && $this->jobseekerFacade->countApplications($user, $job) == 0 &&
            $user->resumes()->count() > 0 && $this->jobseekerFacade->hasPdf($user->resumes->first())) {
            return true;
        }
    }

}
