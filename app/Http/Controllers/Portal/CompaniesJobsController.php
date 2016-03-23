<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Company;
use App\Entities\Job;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Job\EditRequest;
use App\Http\Requests\Job\UpdateRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompaniesJobsController extends ResourceController
{
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
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, $id)
    {
        //
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
            'job'    => $job,
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
        $this->service->updateModel($request->all(), $job);
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
}
