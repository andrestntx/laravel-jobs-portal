<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 8:11 AM
 */

namespace App\Services;


use App\Repositories\Files\UserFileRepository;
use App\Repositories\UserRepository;

class UserService extends ResourceService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    protected $fileRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     * @param UserFileRepository $fileRepository
     */
    public function __construct(UserRepository $userRepository, UserFileRepository $fileRepository)
    {
        $this->repository = $userRepository;
        $this->fileRepository = $fileRepository;
    }

    /**
     * @param array $data
     * @param $user
     */
    public function validAndSavePhoto(array $data, $user)
    {
        if(array_key_exists('photo', $data)) {
            $this->fileRepository->savePhoto($data['photo'], $user);
        }
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