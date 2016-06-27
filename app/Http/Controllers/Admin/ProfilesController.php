<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:44 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\Profile;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Profile\StoreRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Services\ProfileService;

class ProfilesController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.profiles';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.profiles';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "profile";

    /**
     * ProfilesController constructor.
     * @param ProfileService $service
     */
    function __construct(ProfileService $service)
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
        return $this->view('lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->defaultCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->service->createModel($request->all());
        return $this->redirect('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return $this->view('show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return $this->view('form', [
            'profile' => $profile,
            'formData' => $this->getFormDataUpdate($profile->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Profile $profile)
    {
        $this->service->updateModel($request->all(), $profile);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        return $this->service->deleteModel($profile);
    }
}
