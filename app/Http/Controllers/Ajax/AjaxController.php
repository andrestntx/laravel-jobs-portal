<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use App\Services\AjaxService;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 7/4/16
 * Time: 12:34 PM
 */
class AjaxController extends Controller
{
    protected $service;

    /**
     * AjaxController constructor.
     * @param AjaxService $service
     */
    public function __construct(AjaxService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function occupations(Request $request)
    {
        \Log::info($request->get('query'));

        return $this->service->occupations($request->get('query'));
    }
}