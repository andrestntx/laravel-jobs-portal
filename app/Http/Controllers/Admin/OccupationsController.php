<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:44 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\Occupation;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Occupation\StoreRequest;
use App\Http\Requests\Occupation\UpdateRequest;
use App\Services\OccupationService;

class OccupationsController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.occupations';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.occupations';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "occupation";

    /**
     * OccupationsController constructor.
     * @param OccupationService $service
     */
    function __construct(OccupationService $service)
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
     * @param  Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Occupation $occupation)
    {
        return $this->view('show', ['occupation' => $occupation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation)
    {
        return $this->view('form', [
            'occupation' => $occupation,
            'formData' => $this->getFormDataUpdate($occupation->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Occupation $occupation)
    {
        $this->service->updateModel($request->all(), $occupation);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation)
    {
        $this->service->deleteModel($occupation);
    }
}
