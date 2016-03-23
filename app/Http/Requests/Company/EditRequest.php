<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 6:43 PM
 */

namespace App\Http\Requests\Company;


use App\Entities\Resume;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditRequest extends Request
{
    /**
     * @var Resume
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