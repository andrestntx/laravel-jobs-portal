<?php

namespace App\Http\ViewComposers\Activity;

use App\Repositories\ActivityRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(ActivityRepository $repository)
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
        $activities = $this->repository->listsSelect();

        $view->with([
            'activitiesSelect' => $activities,
        ]);
    }
}
