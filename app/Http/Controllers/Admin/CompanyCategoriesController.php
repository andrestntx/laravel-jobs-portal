<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CompanyCategory\StoreRequest;
use App\Http\Requests\CompanyCategory\UpdateRequest;

use App\Http\Controllers\ResourceController;
use App\Entities\CompanyCategory;
use App\Services\CompanyCategoryService;

class CompanyCategoriesController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.company-categories';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.company-categories';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "category";

    function __construct(CompanyCategoryService $service)
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
     * @param  CompanyCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyCategory $category)
    {
        return $this->view('show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CompanyCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyCategory $category)
    {
        return $this->view('form', [
            'category' => $category,
            'formData' => $this->getFormDataUpdate($category->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  CompanyCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CompanyCategory $category)
    {
        $this->service->updateModel($request->all(), $category);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CompanyCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyCategory $category)
    {
        $this->service->deleteModel($category);
    }
}
