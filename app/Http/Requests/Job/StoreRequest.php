<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:37 AM
 */

namespace App\Http\Requests\Job;

use Illuminate\Routing\Route;

class StoreRequest extends CreateRequest
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
     * Get validation rules to create a Job of Company
     * @return array
     */
    public function rules() {
        return [
            'name'              => 'required',
            'description'       => 'required',
            'closing_date'      => 'date',
            'salary'            => 'numeric',
            'experience'        => 'numeric|max:15',
            'occupation_id'     => 'required|exists:occupations,id',
            'contract_type_id'  => 'required|exists:contract_types,id',
            'skills'            => 'exists:skills,id'
        ];
    }
}