<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/22/16
 * Time: 12:36 AM
 */

namespace App\Repositories;


class GeoLocationRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\GeoLocation';
    }

    public function getAllSearch()
    {
        return $this->model->whereIsSearch(1)->paginate();
    }

    public function getSearchSelect()
    {
        return $this->model->whereIsSearch(1)->lists('formatted_address', 'id')->all();
    }


}