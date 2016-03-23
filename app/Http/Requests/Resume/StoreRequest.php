<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:37 AM
 */

namespace App\Http\Requests\Resume;

class StoreRequest extends CreateRequest
{
    /**
     * Get validation rules to create a Jobseeker
     * @return array
     */
    protected function jobseekerRules() {
        return [
            'first_name'    => 'required|max:100',
            'last_name'     => 'required|max:100',
            'doc'           => 'required|unique:jobseekers',
            'email'         => 'required|unique:jobseekers',
            'phone'         => 'required'
        ];
    }

    protected function resumeRules() {
        return [
            'profile'     => 'required',
            'wage_aspiration' => 'numeric'
        ];
    }

    /**
     * Get validation rules to create a Jobseeker and a Resume
     * @return array
     */
    public function rules() {
        return $this->jobseekerRules() + $this->resumeRules();
    }
}