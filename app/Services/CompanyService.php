<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 10:31 AM
 */

namespace App\Services;


use App\Entities\Company;
use App\Repositories\CompanyRepository;
use App\Repositories\Files\CompanyFileRepository;
use Illuminate\Database\Eloquent\Model;

class CompanyService extends ResourceService {

    protected $geoLocationService;
    protected $fileRepository;

    /**
     * CompanyService constructor.
     * @param CompanyRepository $repository
     * @param CompanyFileRepository $fileRepository
     * @param GeoLocationService $geoLocationService
     */
    function __construct(CompanyRepository $repository, CompanyFileRepository $fileRepository, GeoLocationService $geoLocationService)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
        $this->geoLocationService = $geoLocationService;
    }

    /**
     * @return mixed
     */
    public function getAuthCompany()
    {
        return $this->repository->findOrFailByUserId(auth()->user()->id);
    }

    /**
     * @param array $data
     * @param $company
     */
    protected function validAndSavePhoto(array $data, $company)
    {
        if(array_key_exists('logo', $data)) {
            $this->fileRepository->saveLogo($data['logo'], $company);
        }
    }

    /**
     * @param array $data
     * @param Model $company
     * @return mixed
     */
    public function updateModel(array $data, Model $company)
    {
        $this->validAndSavePhoto($data, $company);
        $this->geoLocationService->validAndMerge($data);
        return parent::updateModel($data, $company);
    }

    /**
     * @param Company $company
     * @return string
     */
    public function getLogo(Company $company)
    {
        return $this->fileRepository->getLogoUrl($company);
    }

}