<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/14/16
 * Time: 7:39 PM
 */

namespace App\Services;

use App\Repositories\JobRepository;
use Illuminate\Database\Eloquent\Model;

class JobService extends ResourceService {

    protected $geoLocationService;

    function __construct(JobRepository $repository, GeoLocationService $geoLocationService)
    {
        $this->repository = $repository;
        $this->geoLocationService = $geoLocationService;
    }

    public function updateModel(array $data, Model $entity)
    {
        $this->geoLocationService->validAndMerge($data);
        return parent::updateModel($data, $entity);
    }
}
