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

    /**
     * @return array
     */
    public function getStats()
    {
        return $this->statsService->getStats();
    }

    /**
     * @return mixed
     */
    public function getRegisters()
    {
        return $this->userService->getRegisters();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        $user = $this->userService->createModel($data);
        $this->userService->validAndSavePhoto($data, $user);
        return $user;
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
        $admins = $this->userService->getAdmins();
        $this->emailService->welcomeUser($user);
        $this->emailService->notifyNewUser($user, $admins);

        return $user;
    }
}