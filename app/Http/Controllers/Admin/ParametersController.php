<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:44 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\Parameter;
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

    /**
     * ParametersController constructor.
     * @param ParameterService $service
     */
    function __construct(ParameterService $service)
    {
        $this->service = $service;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->defaultCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->service->createModel($request->all());
        return $this->redirect('index');
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
            'formData' => $this->getFormDataUpdate($parameter->id)
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
        $this->service->updateModel($request->all(), $parameter);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        return $this->service->deleteModel($parameter);
    }
}
