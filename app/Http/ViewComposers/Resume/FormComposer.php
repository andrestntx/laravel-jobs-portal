<?php

namespace App\Http\ViewComposers\Resume;

use App\Repositories\ContractTypeRepository;
use App\Repositories\OccupationRepository;
use App\Repositories\SkillRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class FormComposer extends BaseComposer
{
    protected  $skillRepository;

    /**
     * FormComposer constructor.
     * @param SkillRepository $skillRepository
     */
    function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $skills = $this->skillRepository->listsSelect();
        $sex    = ['M' => ucfirst(\Lang::get('validation.attributes.male')), 'F' => ucfirst(\Lang::get('validation.attributes.famale'))];

        $view->with([
            'skills'    => $skills,
            'sex'       => $sex    
        ]);
    }
}
