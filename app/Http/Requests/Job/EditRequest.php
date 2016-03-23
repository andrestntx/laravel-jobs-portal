<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 6:43 PM
 */

namespace App\Http\Requests\Job;


use App\Entities\Job;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditRequest extends Request
{
    /**
     * @var Job
     */
    protected $job;

    /**
     * UpdateRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->job = $route->getParameter('jobs');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('edit', $this->job);
    }

    /**
     * @return array
     */
    public function rules() {
        return [];
    }
}