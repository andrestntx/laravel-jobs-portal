<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\ContractTypeRepository;
use App\Repositories\OccupationRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FormComposer extends BaseComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $sex        = ['M' => ucfirst(\Lang::get('validation.attributes.male')), 'F' => ucfirst(\Lang::get('validation.attributes.famale'))];
        $docTypes   = ['cc' => ucfirst(\Lang::get('validation.doc_types.cc')), 'passport' => ucfirst(\Lang::get('validation.doc_types.passport'))];


        $view->with([
            'sex'       => $sex,
            'docTypes' => $docTypes
        ]);
    }
}
