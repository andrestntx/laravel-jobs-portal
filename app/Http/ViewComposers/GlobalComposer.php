<?php

namespace App\Http\ViewComposers;

use App\Entities\Parameter;
use App\Repositories\ParameterRepository;
use Illuminate\Contracts\View\View;

class GlobalComposer extends BaseComposer
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
        $companyName = $this->repository->getValue('empresa_nombre');
        $portalDescription = $this->repository->getValue('portal_descripcion');
        $portalLogo = $this->repository->getValue('portal_logo');


        $view->with([
            'companyName' => $companyName,
            'portalDescription' => $portalDescription,
            'portalLogo' => $portalLogo,
        ]);
    }
}
