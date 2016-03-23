<?php

namespace App\Http\ViewComposers\Job;

use App\Repositories\ContractTypeRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FormComposer extends BaseComposer
{
    /**
     * FormComposer constructor.
     * @param ContractTypeRepository $repository
     */
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
        $contractTypes = $this->repository->listsSelect();

        $view->with([
            'contractTypes' => $contractTypes
        ]);
    }
}
