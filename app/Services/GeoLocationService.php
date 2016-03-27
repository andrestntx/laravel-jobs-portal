<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/22/16
 * Time: 12:49 AM
 */

namespace App\Services;


use App\Repositories\GeoLocationRepository;

class GeoLocationService extends ResourceService
{

    /**
     * GeoLocationService constructor.
     * @param GeoLocationRepository $repository
     */
    public function __construct(GeoLocationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findOrCreate(array $data)
    {
        return $this->repository->findOrCreate($data["id"], $data);
    }

    public function findOrCreandGetId(array $data){
        return $this->findOrCreate($data)->id;
    }

    public function validData(array $data) {
        return array_key_exists('geo', $data) && array_key_exists('id', $data['geo']) && !empty($data['geo']['id']);
    }

    /**
     * @param array $data
     * @return array
     */
    public function validAndMerge(array $data)
    {
        if($this->validData($data)) {
            $data['geo_location_id'] = $this->findOrCreandGetId($data["geo"]);
        }

        return $data;
    }



}