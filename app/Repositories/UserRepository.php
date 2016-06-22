<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 8:12 AM
 */

namespace App\Repositories;


use App\Entities\User;

class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\User';
    }


    /**
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function addCompany(User $user, array $data)
    {
        return $user->companies()->create($data);
    }
    
    public function admins()
    {
        return $this->model->whereRole('admin')->get();
    } 
}