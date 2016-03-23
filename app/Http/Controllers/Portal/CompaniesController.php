<?php

namespace App\Http\Controllers\Portal;

use App\Entities\Company;
use App\Http\Controllers\ResourceController;
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
     * CompaniesController constructor.
     * @param CompanyService $service
     */
    function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function myCompany()
    {
        return $this->redirect('show', $this->service->getAuthCompany()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->load('jobs.contractType');
        return $this->view('show', ['company' => $company]);
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
            'formData'  => $this->getFormDataUpdate($company->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->service->updateModel($request->all(), $company);
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
