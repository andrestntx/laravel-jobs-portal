<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Job;
use App\Http\Controllers\ResourceController;
use App\Services\JobService;

use App\Http\Requests;

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

    /**
     * CompaniesController constructor.
     * @param JobService $service
     */
    function __construct(JobService $service)
    {
        $this->service = $service;
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
