<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:44 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\User;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\AUser\StoreRequest;
use App\Http\Requests\AUser\AdminUpdateRequest as UpdateRequest;
use App\Services\UserService;

class AdminsController extends ResourceController
{
    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = 'admin.admins';

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = 'admin.admins';

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "admin";

    /**
     * UsersController constructor.
     * @param UserService $service
     */
    function __construct(UserService $service)
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
     * @param  User  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return $this->view('show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return $this->view('form', [
            'admin' => $admin,
            'formData' => $this->getFormDataUpdate($admin->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  User  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $admin)
    {
        $this->service->updateModel($request->all(), $admin);
        return $this->redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        return $this->service->deleteModel($admin);
    }
}
