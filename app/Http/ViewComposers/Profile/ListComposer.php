<?php

namespace App\Http\ViewComposers\Profile;


use App\Repositories\ProfileRepository;
use Illuminate\Contracts\View\View;

use App\Http\ViewComposers\BaseComposer;

class ListComposer extends BaseComposer
{
    function __construct(ProfileRepository $repository)
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
        $profiles = $this->repository->paginate(15);

        $view->with([
            'profiles' => $profiles,
        ]);
    }
}
