<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\ContractTypeRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\ProfileRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FormComposer extends BaseComposer
{
    protected  $profileRepository;

    /**
     * FormComposer constructor.
     * @param ProfileRepository $profileRepository
     */
    function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
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

        $profiles = $this->profileRepository->listsSelect();

        $view->with([
            'sex'      => $sex,
            'docTypes' => $docTypes,
            'profiles' => $profiles
        ]);
    }
}
