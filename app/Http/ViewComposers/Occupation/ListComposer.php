<?php

namespace App\Http\ViewComposers\Occupation;


use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(OccupationRepository $repository)
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
        $occupations = $this->repository->all();

        $view->with([
            'occupations' => $occupations,
        ]);
    }
}
