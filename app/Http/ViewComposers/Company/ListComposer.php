<?php

namespace App\Http\ViewComposers\Company;

use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;
use App\Repositories\CompanyRepository;

class ListComposer extends BaseComposer
{
    function __construct(CompanyRepository $repository)
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
        $companies = $this->repository->all();

        $view->with([
            'companies' => $companies,
        ]);
    }
}
