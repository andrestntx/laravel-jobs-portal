<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 7:52 PM
 */

namespace App\Http\Controllers\Portal;


use App\Entities\Study;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Study\DestroyRequest;
use App\Services\StudyService;

class StudiesController extends ResourceController
{

    /**
     * StudiesController constructor.
     * @param StudyService $service
     */
    public function __construct(StudyService $service)
    {
        $this->service = $service;
    }

    /**
     * @param DestroyRequest $request
     * @param Study $study
     * @return array
     */
    public function destroy(DestroyRequest $request, Study $study)
    {
        if($this->service->deleteModel($study)) {
            return ['success' => true, 'message' => 'Estudio eliminado'];
        }

        return ['success' => false, 'message' => 'Error'];
    }
}