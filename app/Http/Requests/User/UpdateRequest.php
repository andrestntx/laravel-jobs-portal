<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 5/21/16
 * Time: 4:07 PM
 */

namespace App\Http\Requests\User;


use Illuminate\Routing\Route;
use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    protected $user;

    /**
     * DestroyRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->user = $route->getParameter('users');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('account', $this->user);
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,id,' . $this->user->id,
            'password' => 'confirmed|min:6',
        ];
    }

}