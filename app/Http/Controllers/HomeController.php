<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Facades\UserFacade;
use App\Http\Requests;
use App\Http\Requests\AUser\UpdateRequest;

class HomeController extends Controller
{
    protected $userFacade;

    /**
     * Create a new controller instance.
     *
     * @param UserFacade $userFacade
     */
    public function __construct(UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->to('jobs');
    }

    public function account()
    {
        return view('account.form', [
            'user' => auth()->user(),
            'formData' => ['route' => ['account', auth()->user()], 'method' => 'POST', 'files' => true]
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postAccount(UpdateRequest $request, User $user)
    {
        $this->userFacade->updateUser($request->all(), $user);
        return redirect()->to('account');
    }
}
