<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 7:53 PM
 */

namespace App\Http\Controllers\Portal;

use App\Entities\Experience;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\Experience\DestroyRequest;
use App\Services\ExperienceService;

class ExperiencesController extends ResourceController
{

    /**
     * ExperiencesController constructor.
     * @param ExperienceService $service
     */
    public function __construct(ExperienceService $service)
    {
        $this->service = $service;
    }

    public function destroy(DestroyRequest $request, Experience $experience)
    {
        if($this->service->deleteModel($experience)) {
            return ['success' => true, 'message' => 'Experiencia eliminada'];
        }

        return ['success' => false, 'message' => 'Error'];
    }
}