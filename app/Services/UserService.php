<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 8:11 AM
 */

namespace App\Services;


use App\Repositories\UserRepository;

class UserService
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
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function register(array $data){

        $user = $this->userRepository->create($data);

        if($user->isEmployer()) {
            $this->userRepository->addCompany($user, ['name' => $data['company']]);
        }

        return $user;
    }
}