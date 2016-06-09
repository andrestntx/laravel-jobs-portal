<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Facades\UserFacade;
use App\Services\UserService;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Get the maximum number of login attempts for delaying further attempts.
     *
     * @var int
     */
    protected $maxLoginAttempts = 4;

    /**
     * The number of seconds to delay further login attempts.
     *
     * @var int
     */
    protected $lockoutTime = 30;

    private $userFacade;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserFacade $userFacade
     */
    public function __construct(UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => 'required|max:255',
            'email'             => 'required|email|max:255|unique:users',
            'role'              => 'required|in:jobseeker,employer',
            'password'          => 'required|confirmed|min:6',
            'company'           => 'required_if:role,employer|unique:companies,name',
            'nit'               => 'required_if:role,employer|unique:companies',
            'terms-employer'    => 'required_if:role,employer',
            'terms-jobseeker'   => 'required_if:role,jobseeker',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->userFacade->register($data);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if(auth()->user()->isJobseeker()){
            return '/my-resume';
        }
        else if(auth()->user()->isEmployer()){
            return '/my-company';
        }

        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';

    }
}
