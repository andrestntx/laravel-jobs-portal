<?php

namespace App\Http\ViewComposers\CompanyCategory;

use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;
use App\Repositories\CompanyCategoryRepository;

class ListComposer extends BaseComposer
{
    function __construct(CompanyCategoryRepository $repository)
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
