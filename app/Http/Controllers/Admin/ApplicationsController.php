<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Job;
use App\Facades\AdminFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplicationsController extends Controller
{
    protected $adminFacade;

    /**
     * ApplicationsController constructor.
     * @param AdminFacade $adminFacade
     */
    public function __construct(AdminFacade $adminFacade)
    {
        $this->adminFacade = $adminFacade;
    }


    /**
     * Display options of admin view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->adminFacade->getJobsApplications();

        return view('admin.applications.lists')->with(['jobs' => $jobs]);
    }

    public function show(Request $request, Job $job)
    {
        $applications = $job->applications()
            ->where('preselected', 0)
            ->with(['resume.jobseeker'])
            ->get();

        return view('admin.applications.show')->with([
            'job' => $job,
            'applications' => $applications
        ]);
    }

    public function select(Request $request, Job $job)
    {
        $this->adminFacade->preselect($job, $request->get('applications'));
        return ['success' => true];
    }
}
