<?php

namespace App\Repositories;




class ParameterRepository extends BaseRepository
{
    protected $parameters = null;

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Parameter';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|null|static[]
     */
    public function getParameters()
    {
        if(is_null($this->parameters)) {
            $this->parameters = $this->model->all();
        }

        return $this->parameters;
    }

    public function getValue($attribute)
    {
        $parameter = $this->getParameters()->where('name', $attribute)->first();

        if($parameter) {
            return $parameter->value;
        }

        return 'sin valor';
    }
}
