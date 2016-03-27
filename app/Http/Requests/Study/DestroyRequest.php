<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 6:36 PM
 */

namespace App\Http\Requests\Study;

use App\Entities\Resume;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class DestroyRequest extends Request
{
    protected $study;

    /**
     * DestroyRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->study = $route->getParameter('studies');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('destroy', $this->study);
    }

    /**
     * @return array
     */
    public function rules() {
        return [];
    }
}
