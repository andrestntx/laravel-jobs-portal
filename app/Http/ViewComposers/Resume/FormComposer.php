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

        $view->with([
            'skills'        => $skills
        ]);
    }
}
