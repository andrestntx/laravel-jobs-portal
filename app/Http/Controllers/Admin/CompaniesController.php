<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Company;
use App\Entities\Job;
use App\Facades\EmployerFacade;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Company\UpdateRequest;
use App\Services\CompanyService;
use Carbon\Carbon;
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
     * @param EmployerFacade $facade
     */
    function __construct(CompanyService $service, EmployerFacade $facade)
    {
        $this->service = $service;
        $this->facade = $facade;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view('lists', []);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function active(Company $company)
    {
        $user = $company->user;

        if($company->active){
            $company->active = 0;
            $user->activated_at = null;
        }
        else {
            $company->active = 1;
            $user->activated_at = Carbon::now()->toDateTimeString();
        }

        $company->save();
        $user->save();

        return ['success' => true];
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        return $this->service->deleteModel($company);
    }


}
