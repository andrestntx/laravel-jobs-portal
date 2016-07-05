<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Facades\UserFacade;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistersController extends Controller
{
    protected $facade;

    /**
     * StatsController constructor.
     * @param UserFacade $facade
     */
    public function __construct(UserFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        return view('admin.registers')->with('registers', $this->facade->getRegisters());
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
