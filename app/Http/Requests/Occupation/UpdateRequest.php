<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:51 AM
 */

namespace App\Http\Requests\Occupation;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UpdateRequest extends Request
{
    /**
     * @var Route
     */
    private $route;
    /**
     * @var StoreRequest
     */
    private $storeRequest;

    /**
     * UpdateRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->storeRequest = new StoreRequest;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get validation rules to create a Occupation
     * @return array
     */
    public function rules() {
        $occupation = $this->route->getParameter('occupations');

        $rules = $this->storeRequest->rules();
        $rules['name'] .= ',name,' . $occupation->id . ',id';

        return $rules;
    }
}