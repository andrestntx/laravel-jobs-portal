<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:44 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\Parameter;
use App\Facades\ParameterFacade;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Parameter\StoreRequest;
use App\Http\Requests\Parameter\UpdateRequest;
use App\Services\ParameterService;

class ParametersController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.parameters';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.parameters';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "parameter";

    protected $facade;

    /**
     * ParametersController constructor.
     * @param ParameterFacade $facade
     */
    function __construct(ParameterFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view('lists');
    }

    /**
     * Display the specified resource.
     *
     * @param  Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        return $this->view('show', ['parameter' => $parameter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        return $this->view('form', [
            'parameter' => $parameter,
            'formData' => $this->getFormDataUpdate($parameter->id, true)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Parameter $parameter)
    {
        $this->facade->updateParameter($request->all(), $parameter);
        return $this->redirect('index');
    }

}
