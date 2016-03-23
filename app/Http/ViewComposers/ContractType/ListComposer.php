<?php

namespace App\Http\ViewComposers\ContractType;

use App\Repositories\ContractTypeRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(ContractTypeRepository $repository)
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
        $types = $this->repository->all();

        $view->with([
            'types' => $types,
        ]);
    }
}
