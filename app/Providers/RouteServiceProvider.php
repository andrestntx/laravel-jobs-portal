<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->model('company_categories', 'App\Entities\CompanyCategory');
        $router->model('job_categories', 'App\Entities\JobCategory');
        $router->model('contract_types', 'App\Entities\ContractType');
        $router->model('occupations', 'App\Entities\Occupation');
        $router->model('resumes', 'App\Entities\Resume');
        $router->model('companies', 'App\Entities\Company');
        $router->model('jobs', 'App\Entities\Job');
        $router->model('experiences', 'App\Entities\Experience');
        $router->model('studies', 'App\Entities\Study');
        $router->model('users', 'App\Entities\User');
        $router->model('geo-locations', 'App\Entities\GeoLocation');
        $router->model('applications', 'App\Entities\Application');
        $router->model('parameters', 'App\Entities\Parameter');
        $router->model('admins', 'App\Entities\User');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
