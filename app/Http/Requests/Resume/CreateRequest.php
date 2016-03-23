<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 6:36 PM
 */

namespace App\Http\Requests\Resume;

use App\Entities\Resume;
use App\Http\Requests\Request;

class CreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('create', new Resume());
    }

    /**
     * @return array
     */
    public function rules() {
        return [];
    }
}
