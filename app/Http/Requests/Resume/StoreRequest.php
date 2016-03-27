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

    protected function newStudyRules() {
        return [
            'new_studies.*.title'       => 'required|string',
            'new_studies.*.institution' => 'required|string'
        ];
    }

    protected function studyRules() {
        return [
            'studies.*.title'       => 'required|string',
            'studies.*.institution' => 'required|string'
        ];
    }

    protected function newExperienceRules() {
        return [
            'new_experiences.*.name'        => 'required|string',
            'new_experiences.*.company'     => 'required|string'
        ];
    }

    protected function experienceRules() {
        return [
            'experiences.*.name'        => 'required|string',
            'experiences.*.company'     => 'required|string'
        ];
    }

    protected function resumeRules() {
        return [
            'profile'           => 'required',
            'wage_aspiration'   => 'numeric'
        ];
    }

    /**
     * Get validation rules to create a Jobseeker and a Resume
     * @return array
     */
    public function rules() {
        return $this->jobseekerRules() + $this->resumeRules() +
            $this->newStudyRules() + $this->studyRules() +
            $this->newExperienceRules() + $this->experienceRules()
        ;

    }
}