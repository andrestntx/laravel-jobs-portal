<?php

namespace App\Http\ViewComposers\Parameter;

use App\Repositories\ParameterRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(ParameterRepository $repository)
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
        $parameters = $this->repository->all();

        $view->with([
            'parameters' => $parameters,
        ]);
    }
}
