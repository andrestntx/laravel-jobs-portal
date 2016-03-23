<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        View::composers([
            'App\Http\ViewComposers\CompanyCategory\ListComposer' => 'admin.company-categories.lists',
            'App\Http\ViewComposers\JobCategory\ListComposer' => 'admin.job-categories.lists',
            'App\Http\ViewComposers\ContractType\ListComposer' => ['admin.contract-types.lists', 'home'],
            'App\Http\ViewComposers\Skill\ListComposer' => 'admin.skills.lists',
            'App\Http\ViewComposers\Job\ListComposer' => ['admin.jobs.lists', 'home'],
            'App\Http\ViewComposers\Job\FormComposer' => 'portal.jobs.form',
            'App\Http\ViewComposers\Company\ListComposer' => 'portal.companies.lists',
            'App\Http\ViewComposers\Company\FormComposer' => 'portal.companies.form'
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
