<?php

namespace App\Repositories;

use App\Entities\Company;
use App\Entities\Job;

class CompanyRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Company';
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findOrFailByUserId($id)
    {
        return $this->findOrFailBy('user_id', $id);
    }

    /**
     * @param Company $company
     * @return mixed
     */
    public function getCompanyJobs(Company $company)
    {
        return $company->jobs()->with(['contractType', 'occupation', 'geoLocation'])->paginate();
    }

    /**
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function saveCompanyJob(Company $company, Job $job)
    {
        return $company->jobs()->save($job);
    }

    /**
     * @param array $data
     * @param $entity
     * @return mixed
     */
    public function update(array $data, $entity)
    {
        if(! array_key_exists('email_new_job', $data))
        {
            $data['email_new_job'] = 0;
        }

        if(! array_key_exists('show_data', $data))
        {
            $data['show_data'] = 0;
        }

        return parent::update($data, $entity);
    }
}
