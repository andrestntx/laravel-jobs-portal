<?php

namespace App\Http\Controllers\Validations;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $rules = [
        'name'              => 'required|max:255',
        'email'             => 'required|email|max:255|unique:users',
        'role'              => 'required|in:jobseeker,employer',
        'password'          => 'required|confirmed|min:6',
        'company'           => 'required_if:role,employer|unique:companies,name',
        'nit'               => 'required_if:role,employer|unique:companies',
        'terms-employer'    => 'required_if:role,employer',
        'terms-jobseeker'   => 'required_if:role,jobseeker'
    ];

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function validation(Request $request)
    {
        if($request->get('validate') && array_key_exists($request->get('validate'), $this->rules)) {

            $validator = Validator::make( $request->all(), [
                $request->get('validate') => $this->rules[$request->get('validate')]
            ]);

            if($validator->passes()){
                return 'true';
            }
        }

        return 'false';
    }
}
