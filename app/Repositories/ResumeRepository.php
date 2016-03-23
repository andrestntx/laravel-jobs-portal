<?php

namespace App\Repositories;



class ResumeRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Resume';
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findByJobseekerId($id)
    {
        return $this->findBy('jobseeker_id', $id);
    }
}
