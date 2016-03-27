<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 6:36 PM
 */

namespace App\Http\Requests\Experience;

use App\Entities\Resume;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class DestroyRequest extends Request
{
    protected $experience;

    /**
     * DestroyRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->experience = $route->getParameter('experiences');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('destroy', $this->experience);
    }

    /**
     * @return array
     */
    public function rules() {
        return [];
    }
}
