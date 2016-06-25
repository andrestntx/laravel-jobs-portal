<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 2:47 PM
 */

namespace App\Services;


use App\Repositories\Files\ParameterFileRepository;
use App\Repositories\ParameterRepository;

class ParameterService extends ResourceService {

    protected $fileRepository;

    /**
     * ParameterService constructor.
     * @param ParameterRepository $repository
     * @param ParameterFileRepository $fileRepository
     */
    function __construct(ParameterRepository $repository, ParameterFileRepository $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
    }

    /**
     * @param array $data
     * @param $parameter
     */
    public function validAndSaveFile(array $data, $parameter)
    {
        if(array_key_exists('parameterFile', $data)) {
            $this->fileRepository->saveParameterFile($data['parameterFile'], $parameter);
        }
    }


}