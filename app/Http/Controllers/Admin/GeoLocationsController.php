<?php

namespace App\Http\Controllers\Admin;

use App\Entities\GeoLocation;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\GeoLocation\StoreRequest;
use App\Services\GeoLocationService;

use App\Http\Requests;

class GeoLocationsController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.geo-locations';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.geo-locations';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "geoLocation";

    function __construct(GeoLocationService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $geoLocation    = $this->service->newModel();
        $geoLocations   = $this->service->getAllSearch();
        $formData       = $this->getFormDataStore();

        return $this->view('lists')->with([
            'geoLocation'   => $geoLocation,
            'geoLocations'  => $geoLocations,
            'formData'      => $formData
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->service->setSearch($request->get('geo'));
        return $this->redirect('index');
    }


    /**
     * @param GeoLocation $geoLocation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(GeoLocation $geoLocation)
    {
        $this->service->setNotSearch($geoLocation);
        return $this->redirect('index');
    }

    /**
     * @param GeoLocation $geoLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeoLocation $geoLocation)
    {
        return $this->service->deleteModel($geoLocation);
    }
}
