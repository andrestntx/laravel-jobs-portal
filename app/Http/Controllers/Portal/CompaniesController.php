<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Company;
use App\Entities\Job;
use App\Facades\EmployerFacade;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Company\UpdateRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use App\Http\Requests;

class CompaniesController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'companies';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'portal.companies';

    /**
     * [$facade service manager]
     * @var EmployerFacade
     */
    protected  $facade;

    /**
     * CompaniesController constructor.
     * @param CompanyService $service
     */
    function __construct(CompanyService $service, EmployerFacade $facade)
    {
        $this->service = $service;
        $this->facade = $facade;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function myCompany()
    {
        if($category = $this->service->getAuthCompany()->category) {
            return $this->redirect('show', $this->service->getAuthCompany()->id);    
        }
        
        return $this->redirect('edit', $this->service->getAuthCompany()->id);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function myJobs()
    {
        if($category = $this->service->getAuthCompany()->category) {
            return $this->redirect('applications', $this->service->getAuthCompany()->id);
        }

        return $this->redirect('edit', $this->service->getAuthCompany()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $logoUrl = $this->service->getLogo($company);

        if(! $company->active && ! \Gate::allows('edit', $company)) {
            abort('404');
        }

        return $this->view('show', [
            'company' => $company,
            'jobs'    => $this->service->getCompanyJobs($company),
            'logoUrl' => $logoUrl
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return $this->view('form', [
            'company'   => $company,
            'formData'  => $this->getFormDataUpdate($company->id, true)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $this->facade->updateCompany($request->all(), $company);
        return $this->redirect('show', $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $this->service->deleteModel($company);
    }
}
