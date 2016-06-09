<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/13/16
 * Time: 11:37 AM
 */

namespace App\Http\Requests\GeoLocation;


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
        return true;
    }

    /**
     * Get validation rules to create a Job of Company
     * @return array
     */
    public function rules() {
        return [
            'address'   => 'required',
            'geo.id'    => 'required'
        ];
    }
}