<?php

namespace App\Http\ViewComposers\Job;

use App\Repositories\JobRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $jobs = $this->repository->all();

        $view->with([
            'jobs' => $jobs,
        ]);
    }
}
