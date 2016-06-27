<?php

namespace App\Http\ViewComposers;

use App\Entities\Parameter;
use App\Repositories\Files\ParameterFileRepository;
use App\Repositories\ParameterRepository;
use Illuminate\Contracts\View\View;

class GlobalComposer extends BaseComposer
{

    protected $parameterFileRepository;

    function __construct(ParameterRepository $repository, ParameterFileRepository $parameterFileRepository)
    {
        $this->repository = $repository;
        $this->parameterFileRepository = $parameterFileRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $portalName = $this->repository->getValue('portal_nombre');
        $portalFirstName = substr($portalName, 0, strlen($portalName) / 2);
        $portalLastName = substr($portalName, strlen($portalName) / 2, strlen($portalName));
        $portalDescription = $this->repository->getValue('portal_descripcion');
        $companyName = $this->repository->getValue('empresa_nombre');
        $companyWeb = $this->repository->getValue('empresa_web');

        $view->with([
            'portalName'       => $portalName,
            'portalFirstName'  => $portalFirstName,
            'portalLastName'   => $portalLastName,
            'portalDescription' => $portalDescription,
            'companyName'      => $companyName,
            'companyWeb'      => $companyWeb,
            'portalLogo' => '/storage/parameters/portal_logo.png?' . time(),
        ]);
    }
}
