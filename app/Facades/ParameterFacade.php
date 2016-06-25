<?php
/**
 * Created by PhpStorm.
 * Parameter: andrestntx
 * Date: 5/21/16
 * Time: 3:57 PM
 */

namespace App\Facades;


use App\Entities\Parameter;
use App\Services\ParameterService;

class ParameterFacade
{
    protected $parameterService;

    /**
     * ParameterFacade constructor.
     * @param ParameterService $parameterService
     */
    public function __construct(ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
    }
    

    /**
     * @param array $data
     * @return mixed
     */
    public function createParameter(array $data)
    {
        $parameter = $this->parameterService->createModel($data);
        $this->parameterService->validAndSaveFile($data, $parameter);
        return $parameter;
    }

    /**
     * @param array $data
     * @param Parameter $parameter
     * @return mixed
     */
    function updateParameter(array $data, Parameter $parameter)
    {
        $this->parameterService->validAndSaveFile($data, $parameter);
        return $this->parameterService->updateModel($data, $parameter);
    }
}