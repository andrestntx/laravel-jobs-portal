<?php

namespace App\Repositories;




class ParameterRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Parameter';
    }

    public function getValue($attribute)
    {
        $parameter = $this->model->where('name', $attribute)->get()->first();

        if($parameter) {
            return $parameter->value;
        }

        return 'sin valor';
    }
}
