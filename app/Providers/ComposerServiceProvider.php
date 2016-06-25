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
            'App\Http\ViewComposers\GlobalComposer' => '*',
            'App\Http\ViewComposers\CompanyCategory\ListComposer' => 'admin.company-categories.lists',
            'App\Http\ViewComposers\JobCategory\ListComposer' => 'admin.job-categories.lists',
            'App\Http\ViewComposers\ContractType\ListComposer' => ['admin.contract-types.lists'],
            'App\Http\ViewComposers\Skill\ListComposer' => 'admin.skills.lists',
            'App\Http\ViewComposers\Occupation\ListComposer' => 'admin.occupations.lists',
            'App\Http\ViewComposers\Parameter\ListComposer' => 'admin.parameters.lists',
            'App\Http\ViewComposers\Admin\ListComposer' => 'admin.admins.lists',
            'App\Http\ViewComposers\Job\ListComposer' => ['portal.jobs.lists', 'home'],
            'App\Http\ViewComposers\Job\FormComposer' => 'portal.jobs.form',
            'App\Http\ViewComposers\Company\ListComposer' => 'portal.companies.lists',
            'App\Http\ViewComposers\Company\FormComposer' => 'portal.companies.form',
            'App\Http\ViewComposers\Resume\FormComposer' => 'portal.resumes.form',
            'App\Http\ViewComposers\Resume\ListComposer' => 'portal.resumes.lists',
            'App\Http\ViewComposers\Resume\FileComposer' => '*',
        ]);
    }

    /**
     * Register the applicadtion services.
     */
    public function register()
    {
        //
    }
}
