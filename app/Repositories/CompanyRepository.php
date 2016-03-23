<?php

namespace App\Repositories;




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
}
