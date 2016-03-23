<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:51 AM
 */

namespace App\Http\Requests\Job;

use Illuminate\Routing\Route;

class UpdateRequest extends EditRequest
{

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
        $this->job = $route->getParameter('jobs');
        $this->storeRequest = new StoreRequest;
    }

    /**
     * Get validation rules to create a Job Category
     * @return array
     */
    public function rules() {

        $rules = $this->storeRequest->rules();
        //$rules['doc'] .= ',doc,' . $this->resume->jobseeker->user_id . ',user_id';

        return $rules;
    }
}