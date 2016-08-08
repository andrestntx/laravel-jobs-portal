<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Company;
use App\Entities\Jobseeker;
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
        return view('admin.stats')->with([
            'stats' => $this->facade->getStats($request->get('start'), $request->get('end')),
            'start' => $request->get('start'),
            'end' => $request->get('end')
        ]);
    }

    public function jobseekers()
    {
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        $csv->insertOne(\Schema::getColumnListing('jobseekers'));

        Jobseeker::all()->each(function($person) use($csv) {
            $csv->insertOne($person->toArray());
        });

        $csv->output('trabajadores.csv');
    }

    public function companies()
    {
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        $csv->insertOne(\Schema::getColumnListing('companies'));

        Company::all()->each(function($person) use($csv) {
            $csv->insertOne($person->toArray());
        });

        $csv->output('empresas.csv');
    }
}
