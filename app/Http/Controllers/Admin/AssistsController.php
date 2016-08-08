<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Activity;
use App\Entities\Job;
use App\Entities\Jobseeker;
use App\Facades\AdminFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssistsController extends Controller
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
        $jobseekers = $this->adminFacade->getJobseekerAssists();
        return view('admin.jobseekers.lists')->with(['jobseekers' => $jobseekers]);
    }

    public function show(Request $request, Jobseeker $jobseeker)
    {
        $activities = $jobseeker->activities()->get();

        return view('admin.jobseekers.assists')->with([
            'jobseeker' => $jobseeker,
            'activities' => $activities
        ]);
    }

    public function store(Request $request, Jobseeker $jobseeker)
    {
        $jobseeker->activities()->attach($request->get('activity_id'), ['assist_at' => $request->get('assist_at')]);
        return redirect()->route('admin.assists.show', $jobseeker);
    }

    public function update(Request $request, Jobseeker $jobseeker, Activity $activity)
    {
        $jobseeker->activities()->detach($activity->id);
        $jobseeker->activities()->attach($request->get('activity_id'), ['assist_at' => $request->get('assist_at')]);

        return redirect()->route('admin.assists.show', $jobseeker);
    }

    public function delete(Request $request, Jobseeker $jobseeker, Activity $activity)
    {
        $jobseeker->activities()->detach($activity->id);
        return redirect()->route('admin.assists.show', $jobseeker);
    }
}
