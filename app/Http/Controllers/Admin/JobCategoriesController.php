<?php

namespace App\Http\Controllers\Admin;

use App\Entities\JobCategory;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\JobCategory\StoreRequest;
use App\Http\Requests\JobCategory\UpdateRequest;
use App\Services\JobCategoryService;

use App\Http\Requests;

class JobCategoriesController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.job-categories';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.job-categories';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "category";

    function __construct(JobCategoryService $service)
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
     * @param  JobCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $category)
    {
        return $this->view('show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  JobCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCategory $category)
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
     * @param  JobCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, JobCategory $category)
    {
        $this->service->updateModel($request->all(), $category);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  JobCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $category)
    {
        $this->service->deleteModel($category);
    }
}
