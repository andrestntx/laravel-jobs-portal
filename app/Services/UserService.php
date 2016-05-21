<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 8:11 AM
 */

namespace App\Services;


use App\Repositories\UserRepository;

class UserService extends ResourceService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function register(array $data){

        $user = $this->repository->create($data);

        if($user->isEmployer()) {
            $this->repository->addCompany($user, ['name' => $data['company'], 'nit' => $data['nit']]);
        }

        return $user;
    }
}