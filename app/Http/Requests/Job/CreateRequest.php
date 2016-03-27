<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 7:09 AM
 */

namespace App\Http\Requests\Job;


use App\Entities\Company;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class CreateRequest extends Request
{
    /**
     * @var Company
     */
    protected $company;

    /**
     * UpdateRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->company = $route->getParameter('companies');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('edit', $this->company);
    }

    /**
     * @return array
     */
    public function rules() {
        return [];
    }
}