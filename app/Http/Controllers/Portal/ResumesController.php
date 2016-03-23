<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Resume;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Resume\CreateRequest;
use App\Http\Requests\Resume\StoreRequest;
use App\Http\Requests\Resume\EditRequest;
use App\Http\Requests\Resume\UpdateRequest;
use App\Services\ResumeService;


class ResumesController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'resumes';


    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'portal.resumes';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "resume";

    /**
     * CompaniesController constructor.
     * @param ResumeService $service
     */
    function __construct(ResumeService $service)
    {
        $this->service = $service;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function myResume()
    {
        if(\Gate::allows('create', $this->service->newModel())){
            return $this->redirect('create');
        }

        return $this->redirect('show', $this->service->getAuthResume()->jobseeker_id);
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
    public function create(CreateRequest $request)
    {
        return $this->view('form', [
            'resume'                => $this->service->newModel(),
            'jobseekerResume'       => $this->service->getModelsForm(new Resume()),
            'formData'              => $this->getFormDataStore(true)
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $resume = $this->service->createResume($request->all());
        return $this->redirect('show', $resume);
    }

    /**
     * Display the specified resource.
     *
     * @param Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        $photoUrl = $this->service->getPhoto($resume);
        $resumeFileUrl = $this->service->getResumeFile($resume);

        return $this->view('show', [
            'resume' => $resume,
            'photoUrl' => $photoUrl,
            'resumeFileUrl' => $resumeFileUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditRequest $request
     * @param Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Resume $resume)
    {
        return $this->view('form', [
            'resume'            => $resume,
            'jobseekerResume'   => $this->service->getModelsForm($resume),
            'formData'          => $this->getFormDataUpdate($resume->jobseeker_id, true)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Resume $resume)
    {
        $this->service->updateResume($request->all(), $resume);
        return $this->redirect('show', $resume);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        $this->service->deleteModel($resume);
    }
}
