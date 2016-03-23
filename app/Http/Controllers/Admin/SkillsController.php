<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 3:39 PM
 */

namespace App\Http\Controllers\Admin;

use App\Entities\Skill;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Skill\StoreRequest;
use App\Http\Requests\Skill\UpdateRequest;
use App\Services\SkillService;

class SkillsController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.skills';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.skills';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "skill";

    function __construct(SkillService $service)
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
     * @param  Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return $this->view('show', ['category' => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return $this->view('form', [
            'skill' => $skill,
            'formData' => $this->getFormDataUpdate($skill->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Skill $skill)
    {
        $this->service->updateModel($request->all(), $skill);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $this->service->deleteModel($skill);
    }
}
