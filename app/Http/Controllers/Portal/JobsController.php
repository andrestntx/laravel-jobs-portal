<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Job;
use App\Facades\EmployerFacade;
use App\Http\Controllers\ResourceController;

use App\Http\Requests;
use Illuminate\Http\Request;

class JobsController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'jobs';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'portal.jobs';

    protected $facade;

    /**
     * CompaniesController constructor.
     * @param EmployerFacade $facade
     */
    function __construct(EmployerFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->facade->searchJobs($request->get('occupation'), $request->get('company'),
            $request->get('contract-types'), $request->get('location'), $request->get('search'),
            $request->get('experience', 0), $request->get('salary'));

        $defaultVars = [
            'occupation' => $request->get('occupation'),
            'location' => $request->get('location'),
            'search' => $request->get('search'),
            'experience' => $request->get('experience'),
            'contractTypesSelect' => $request->get('contract-types'),
            'salaryRange' => $request->get('salary')
        ];

        return view('portal.jobs.lists')->with(array_merge($result, $defaultVars));
    }

    /**
     * Display the specified resource.
     *
     * @param Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return $this->view('show', ['job' => $job]);
    }
}
