<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 5/21/16
 * Time: 3:57 PM
 */

namespace App\Facades;


use App\Entities\User;
use App\Services\UserService;

class UserFacade
{
    protected $userService;

    /**
     * UserFacade constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param array $data
     * @param User $user
     * @return mixed
     */
    function updateUser(array $data, User $user)
    {
        return $this->userService->updateModel($data, $user);
    }
}