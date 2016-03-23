<?php

namespace App\Http\ViewComposers;

use App\Repositories\BaseRepository;
use Illuminate\Contracts\View\View;

abstract class BaseComposer
{
    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    abstract public function compose(View $view);
}
