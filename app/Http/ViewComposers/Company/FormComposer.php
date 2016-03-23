<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 3:24 PM
 */

namespace App\Http\ViewComposers\Company;

use App\Http\ViewComposers\BaseComposer;
use App\Repositories\CompanyCategoryRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Contracts\View\View;

class FormComposer extends BaseComposer
{
    function __construct(CompanyCategoryRepository $repository)
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
        $categories = $this->repository->listsSelect();

        $view->with([
            'categories' => $categories
        ]);
    }
}