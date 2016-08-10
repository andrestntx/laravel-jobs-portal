<?php

namespace App\Policies;

use App\Entities\Company;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
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
     * @param Company $company
     * @return bool
     */
    public function edit(User $user, Company $company)
    {
        if($user->id == $company->user_id) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function showData(User $user, Company $company)
    {
        if($user->id == $company->user_id || $company->show_data) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function adminJobs(User $user, Company $company)
    {
        if($user->id == $company->user_id && ! is_null($company->category)) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Company $company
     * @return bool
     */
    public function createJobs(User $user, Company $company)
    {
        \Log::info('entra');
        if($this->adminJobs($user, $company) && ! is_null($user->activated_at)) {
            return true;
        }
    }

}
