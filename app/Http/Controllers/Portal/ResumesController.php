<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Resume;
use App\Facades\JobseekerFacade;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Resume\CreateRequest;
use App\Http\Requests\Resume\StoreRequest;
use App\Http\Requests\Resume\EditRequest;
use App\Http\Requests\Resume\UpdateRequest;
use App\Repositories\Files\CompanyFileRepository;
use App\Services\ResumeService;
use Illuminate\Http\Request;


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
     * [$facade service manager]
     * @var JobseekerFacade
     */
    protected  $facade;

    /**
     * CompaniesController constructor.
     * @param ResumeService $service
     * @param JobseekerFacade $facade
     */
    function __construct(ResumeService $service, JobseekerFacade $facade)
    {
        $this->service = $service;
        $this->facade = $facade;
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
     *
     * @return \Illuminate\Http\Response
     */
    public function myApplications()
    {
        $this->authorize('isJobseeker', auth()->user());
        return $this->redirect('applications', $this->service->getAuthResume()->jobseeker_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->facade->searchResumes($request->get('occupation'), $request->get('profile'),
            $request->get('experience', 0), $request->get('search'));

        $defaultVars = [
            'occupation'    => $request->get('occupation'),
            'profile'       => $request->get('profile'),
            'search'        => $request->get('search'),
            'experience'    => $request->get('experience')
        ];

        return $this->view('lists')->with(array_merge($result, $defaultVars));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        return $this->view('form', [
            'resume'                => $this->service->newModel(),
            'jobseekerResume'       => $this->service->getModelsForm(new Resume()),
            'occupations'           => [],
            'formData'              => $this->getFormDataStore(true)
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $resume = $this->facade->createResume($request->all(), $request->get('new_studies'), $request->get('new_experiences'));

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
        $photoUrl = $this->facade->getPhoto($resume->jobseeker);
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
            'occupations'       => $resume->occupation_array,
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
        $this->facade->updateResume($resume, $request->all(), $request->get('new_studies'),
            $request->get('studies'), $request->get('new_experiences'), $request->get('experiences')
        );

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

    /**
     * @param Resume $resume
     * @return \Illuminate\Auth\Access\Response|\Illuminate\Http\RedirectResponse
     */
    public function applications(Resume $resume)
    {
        $this->authorize('isJobseeker', auth()->user());

        if(\Gate::allows('edit', $resume)) {
            $photoUrl   = $this->facade->getPhoto($resume->jobseeker);
            $logos      = new CompanyFileRepository();

            $jobs = $resume->jobs()->with(['company', 'occupation', 'contractType', 'geoLocation'])->paginate();

            return $this->view('applications', [
                'resume'    => $resume,
                'jobs'      => $jobs,
                'photoUrl'  => $photoUrl,
                'logos'     => $logos
            ]);
        }

        return redirect()->to('my-applications');
    }
}
