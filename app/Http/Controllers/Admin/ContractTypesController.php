<?php

namespace App\Http\Controllers\Admin;

use App\Entities\ContractType;
use App\Http\Controllers\ResourceController;

use App\Http\Requests\ContractType\StoreRequest;
use App\Http\Requests\ContractType\UpdateRequest;
use App\Services\ContractTypeService;

class ContractTypesController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.contract-types';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.contract-types';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "type";

    function __construct(ContractTypeService $service)
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
     * @param  ContractType  $type
     * @return \Illuminate\Http\Response
     */
    public function show(ContractType $type)
    {
        return $this->view('show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ContractType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractType $type)
    {
        return $this->view('form', [
            'type' => $type,
            'formData' => $this->getFormDataUpdate($type->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  ContractType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, ContractType $type)
    {
        $this->service->updateModel($request->all(), $type);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContractType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $type)
    {
        $this->service->deleteModel($type);
    }
}
