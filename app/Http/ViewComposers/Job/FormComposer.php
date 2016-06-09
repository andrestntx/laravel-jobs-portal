<?php

namespace App\Http\ViewComposers\Job;

use App\Repositories\ContractTypeRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FormComposer extends BaseComposer
{
    protected  $occupationRepository;
    protected  $skillRepository;

    /**
     * FormComposer constructor.
     * @param ContractTypeRepository $repository
     * @param OccupationRepository $occupationRepository
     */
    function __construct(ContractTypeRepository $repository, OccupationRepository $occupationRepository)
    {
        $this->repository = $repository;
        $this->occupationRepository = $occupationRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $occupations = $this->occupationRepository->listsSelect();
        $contractTypes = $this->repository->listsSelect();

        $view->with([
            'contractTypes' => $contractTypes,
            'occupations'   => $occupations
        ]);
    }
}
