<?php

namespace App\Http\ViewComposers\Skill;

use App\Repositories\SkillRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(SkillRepository $repository)
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
        $skills = $this->repository->all();

        $view->with([
            'skills' => $skills,
        ]);
    }
}
