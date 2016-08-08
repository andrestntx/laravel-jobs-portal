<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Application;
use App\Entities\Company;
use App\Entities\Job;
use App\Facades\EmployerFacade;
use App\Facades\JobseekerFacade;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Job\ApplyRequest;
use App\Http\Requests\Job\CreateRequest;
use App\Http\Requests\Job\EditRequest;
use App\Http\Requests\Job\StoreRequest;
use App\Http\Requests\Job\UpdateRequest;
use App\Repositories\Files\JobseekerFileRepository;
use App\Services\JobService;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompaniesJobsController extends ResourceController
{
    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "job";

    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = "companies.jobs";

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = "portal.jobs";

    /**
     * [$facade service manager]
     * @var EmployerFacade
     */
    protected  $facade;

    /**
     * [$facade service manager]
     * @var JobseekerFacade
     */
    protected $jobseekerFacade;

    /**
     * CompaniesController constructor.
     * @param JobService $service
     * @param EmployerFacade $facade
     * @param JobseekerFacade $jobseekerFacade
     */
    function __construct(JobService $service, EmployerFacade $facade, JobseekerFacade $jobseekerFacade)
    {
        $this->service = $service;
        $this->facade = $facade;
        $this->jobseekerFacade = $jobseekerFacade;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        return redirect()->route('companies.show', $company);
    }


    /**
     * @param CreateRequest $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request, Company $company)
    {
        return $this->defaultCreate([
            'company'   => $company
            ], $company->id
        );
    }


    /**
     * @param StoreRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, Company $company)
    {
        $job = $this->facade->createCompanyJob($company, $request->all());
        return $this->redirect('show', [$company, $job]);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Company $company, Job $job)
    {
        $logoUrl = $this->facade->getCompanyLogo($company);

        return $this->view('show', [
            'job' => $job,
            'logoUrl' => $logoUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditRequest $request
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Company $company, Job $job)
    {
        return $this->view('form', [
            'company'   => $company,
            'job'       => $job,
            'formData'  => $this->getFormDataUpdate([$company, $job])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Company $company, Job $job)
    {
        $this->facade->updateJob($request->all(), $job);
        return $this->redirect('show', [$company, $job]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Job $job)
    {
        $this->service->deleteModel($job);
    }


    /**
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Auth\Access\Response
     */
    public function apply(Company $company, Job $job)
    {
        return $this->view('apply', ['job' => $job, 'company' => $company]);
    }


    /**
     * @param ApplyRequest $request
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postApply(ApplyRequest $request, Company $company, Job $job)
    {
        $this->jobseekerFacade->applyJob($job, $request->all());
        return $this->view('thanks', ['company' => $company, 'job' => $job]);
    }


    /**
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Auth\Access\Response
     */
    public function applications(Request $request, Company $company)
    {
        $this->authorize('edit', $company);
        $logoUrl    = $this->facade->getCompanyLogo($company);
        $jobs =     $company->jobs()->with(['applications' => function($query) {
            $query->where('preselected', 1);
        }, 'applications.resume.jobseeker.geoLocation'])->get();

        return $this->view('applications', [
            'logoUrl'   => $logoUrl,
            'jobs'      => $jobs,
            'company'   => $company
        ]);
    }

    /**
     * @param Request $request
     * @param Company $company
     * @param Job $job
     * @return \Illuminate\Auth\Access\Response
     */
    public function jobApplications(Request $request, Company $company, Job $job)
    {
        $this->authorize('edit', $job);
        $logos      = new JobseekerFileRepository();
        $logoUrl   = $this->facade->getCompanyLogo($company);
        $applications = $job->applications()->where('preselected', 1)->with(['resume.jobseeker.geoLocation'])->paginate();

        return $this->view('show-applications', [
            'job' => $job,
            'logoUrl' => $logoUrl,
            'applications' => $applications,
            'logos' => $logos
        ]);
    }

    /**
     * @param Request $request
     * @param Company $company
     * @param Job $job
     * @param Application $application
     * @return \Illuminate\Auth\Access\Response
     */
    public function resumeApplications(Request $request, Company $company, Job $job, Application $application)
    {
        $this->authorize('edit', $job);
        $resume = $application->resume;

        $photoUrl = $this->jobseekerFacade->getPhoto($resume->jobseeker);
        $resumeFileUrl = $this->jobseekerFacade->getResumeFile($resume);

        return $this->view('show-application', [
            'resume' => $resume,
            'application' => $application,
            'photoUrl' => $photoUrl,
            'resumeFileUrl' => $resumeFileUrl
        ]);
    }

    public function acceptJobApplication(Request $request, Company $company, Job $job)
    {
        $application = $job->applications()->findOrFail($request->get('application'));

        \Log::info($application);

        if($application->accepted) {
            \Log::info('chao');
            $application->accepted = 0;
        }
        else {
            \Log::info('hola');
            $application->accepted = 1;
        }

        $application->save();

        return ['success' => true];
    }
}
