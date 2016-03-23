<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 6:43 PM
 */

namespace App\Http\Requests\Resume;


use App\Entities\Resume;
use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditRequest extends Request
{
    /**
     * @var Resume
     */
    protected $resume;

    /**
     * UpdateRequest constructor.
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->resume = $route->getParameter('resumes');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('edit', $this->resume);
    }

    /**
     * @return array
     */
    public function rules() {
        return [];
    }
}