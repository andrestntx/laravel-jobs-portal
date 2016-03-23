<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:37 AM
 */

namespace App\Http\Requests\Job;

use App\Entities\Job;
use App\Http\Requests\Request;

class StoreRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('create', new Job());
    }

    /**
     * Get validation rules to create a Jobseeker and a Resume
     * @return array
     */
    public function rules() {
        return [

        ];
    }
}