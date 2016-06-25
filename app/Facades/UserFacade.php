<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 5/21/16
 * Time: 3:57 PM
 */

namespace App\Facades;


use App\Entities\User;
use App\Services\EmailService;
use App\Services\StatsService;
use App\Services\UserService;

class UserFacade
{
    protected $userService;
    protected $emailService;
    protected $statsService;

    /**
     * UserFacade constructor.
     * @param UserService $userService
     * @param EmailService $emailService
     * @param StatsService $statsService
     */
    public function __construct(UserService $userService, EmailService $emailService, StatsService $statsService)
    {
        $this->userService = $userService;
        $this->emailService = $emailService;
        $this->statsService = $statsService;
    }

    public function getStats()
    {
        return $this->statsService->getStats();
    }

    /**
     * @param array $data
     * @param User $user
     * @return mixed
     */
    function updateUser(array $data, User $user)
    {
        $this->userService->validAndSavePhoto($data, $user);
        return $this->userService->updateModel($data, $user);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function register(array $data)
    {
        $user = $this->userService->register($data);
        $this->emailService->welcomeUser($user);

        return $user;
    }
}