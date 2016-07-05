<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:51 AM
 */

namespace App\Http\Requests\Company;

use Illuminate\Routing\Route;

class UpdateRequest extends EditRequest
{
    /**
     * UpdateRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->company = $route->getParameter('companies');
    }


    /**
     * Get validation rules to create a Job Category
     * @return array
     */
    public function rules() {
        return [
            'nit'                   => 'required|min:6|unique:companies,nit,' . $this->company->id. ',id',
            'name'                  => 'required|unique:companies,name,' . $this->company->id. ',id',
            'company_category_id'   => 'required|exists:company_categories,id'
        ];
    }
}