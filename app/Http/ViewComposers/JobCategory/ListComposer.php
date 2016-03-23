<?php

namespace App\Http\ViewComposers\JobCategory;

use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;
use App\Repositories\JobCategoryRepository;

class ListComposer extends BaseComposer
{
    function __construct(JobCategoryRepository $repository)
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
        $categories = $this->repository->all();

        $view->with([
            'categories' => $categories,
        ]);
    }
}
