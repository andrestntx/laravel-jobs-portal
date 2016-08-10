<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Facades\JobseekerFacade;
use App\Facades\UserFacade;
use App\Repositories\JobseekerRepository;
use App\Repositories\ResumeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistersController extends Controller
{
    protected $facade;
    protected $repository;

    /**
     * StatsController constructor.
     * @param UserFacade $facade
     * @param ResumeRepository $repository
     */
    public function __construct(UserFacade $facade, ResumeRepository $repository)
    {
        $this->facade = $facade;
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        $resumes = $this->repository->model->with('jobseeker.user')->get();
        return view('admin.registers')->with('resumes', $resumes);
    }

    public function active(User $user)
    {
        if($user->activated_at != null) {
            $user->activated_at = null;
        }
        else {
            $user->activated_at = Carbon::now()->toDateTimeString();
        }

        $user->save();

        return ['success' => true];
    }
}
