<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/29/16
 * Time: 12:45 PM
 */

namespace App\Http\Requests\Job;


use App\Entities\Job;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class ApplyRequest extends Request
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
        return \Gate::allows('apply', $this->job);
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            'intro' => 'required'
        ];
    }
}