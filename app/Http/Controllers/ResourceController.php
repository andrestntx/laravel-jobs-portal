<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Services\ResourceService;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class ResourceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * [$routePrefix prefix route in more one response view]
     * @var string
     */
    protected $routePrefix = "";

    /**
     * [$viewPath folder views Controller]
     * @var string
     */
    protected $viewPath = "";

    /**
     * [$modelName used in views]
     * @var string
     */
    protected $modelName = "entity";

    /**
     * [$service Service to BL]
     * @var ResourceService
     */
    protected $service;

    /**
     * @return string
     */
    protected function getViewPath()
    {
    	return $this->viewPath;
    }

    /**
     * @return string
     */
    protected function getRoutePrefix()
    {
    	return $this->routePrefix;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $args
     * @param null|string|array $formDataArgs
     * @param bool $files
     * @return \Illuminate\Http\Response
     */
    public function defaultCreate(array $args = array(), $formDataArgs = null, $files = false)
    {
        $defaultArgs = [
            $this->modelName    => $this->service->newModel(),
            'formData'          => $this->getFormDataStore($files, $formDataArgs)
        ];

        return $this->view('form', array_merge($defaultArgs, $args));
    }

    /**
     * @param $viewName
     * @param array $args
     * @return Response
     */
    protected function view($viewName, array $args = array())
    {
        return view($this->getViewPath() . '.' . $viewName)->with($args);
    }

    /**
     * @param $actionRoute
     * @param array|null $params
     * @return array|string
     */
    protected function getRoute($actionRoute, $params = null)
    {
        $routeName = $this->getRoutePrefix() . '.' . $actionRoute;

        if(!is_null($params)){
            return [$routeName, $params];
        }

        return $routeName;
    }

    /**
     * @param $actionRoute
     * @param array|null $params
     * @return array|string
     */
    protected function getFormDataRoute($actionRoute, $params = null)
    {
        $routeName = $this->getRoutePrefix() . '.' . $actionRoute;

        if(is_array($params)) {
            return array_merge([$routeName], $params);
        }
        else if(!is_null($params)) {
            return [$routeName, $params];
        }

        return $routeName;
    }

    /**
     * @param $actionRoute
     * @param array|string|null $params
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirect($actionRoute, $params = null)
    {
        return redirect()->route($this->getRoute($actionRoute), $params);
    }

    /**
     * @param $route
     * @param string $method
     * @param bool $files
     * @return array
     */
    protected function getFormData($route, $method = 'POST', $files = false)
    {
        return ['route' => $route, 'method' => $method, 'files' => $files];
    }

    /**
     * @param bool $files
     * @param null $id
     * @return array
     */
    protected function getFormDataStore($files = false, $id = null)
    {
        return $this->getFormData($this->getFormDataRoute('store', $id), 'POST', $files);
    }

    /**
     * @param $id
     * @param bool $files
     * @return array
     */
    protected function getFormDataUpdate($id, $files = false)
    {
        return $this->getFormData($this->getFormDataRoute('update', $id), 'PUT', $files);

    }

}
