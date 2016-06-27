<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\ContractTypeRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FormComposer extends BaseComposer
{
    protected  $occupationRepository;

    /**
     * FormComposer constructor.
     * @param OccupationRepository $occupationRepository
     */
    function __construct(OccupationRepository $occupationRepository)
    {
        $this->occupationRepository = $occupationRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $sex        = ['M' => ucfirst(\Lang::get('validation.attributes.male')), 'F' => ucfirst(\Lang::get('validation.attributes.famale'))];
        $docTypes   = ['cc' => ucfirst(\Lang::get('validation.doc_types.cc')), 'passport' => ucfirst(\Lang::get('validation.doc_types.passport'))];

        $occupations = $this->occupationRepository->listsSelect();

        $view->with([
            'sex'       => $sex,
            'docTypes' => $docTypes,
            'occupations'   => $occupations
        ]);
    }
}
