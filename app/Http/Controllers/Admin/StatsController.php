<?php

namespace App\Http\Controllers\Admin;

use App\Facades\UserFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    protected $facade;

    /**
     * StatsController constructor.
     * @param UserFacade $facade
     */
    public function __construct(UserFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        return view('admin.stats')->with('stats', $this->facade->getStats());
    }
}
