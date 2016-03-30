<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * @return int
     */
    public function count()
    {
        return count($this->all());
    }
}
