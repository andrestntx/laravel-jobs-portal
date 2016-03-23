<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/21/16
 * Time: 10:43 AM
 */

namespace App\Services;

use App\Entities\Jobseeker;
use App\Entities\Resume;
use App\Repositories\Files\JobseekerFileRepository;
use App\Repositories\JobseekerRepository;
use Illuminate\Database\Eloquent\Model;

class JobseekerService extends ResourceService
{
    protected $geoLocationService;
    protected $fileRepository;

    /**
     * JobseekerService constructor.
     * @param JobseekerRepository $repository
     * @param JobseekerFileRepository $fileRepository
     * @param GeoLocationService $geoLocationService
     */
    function __construct(JobseekerRepository $repository, JobseekerFileRepository $fileRepository, GeoLocationService $geoLocationService)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
        $this->geoLocationService = $geoLocationService;
    }

    /**
     * @param Jobseeker $jobseeker
     * @param Resume $newResume
     * @return mixed
     */
    public function addNewResume(Jobseeker $jobseeker, Resume $newResume) {
        return $this->repository->saveResume($jobseeker, $newResume);
    }

    /**
     * @param array $data
     * @param $jobseeker
     */
    protected function validAndSavePhoto(array $data, $jobseeker)
    {
        if(array_key_exists('photo', $data)) {
            $this->fileRepository->savePhoto($data['photo'], $jobseeker);
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createModel(array $data)
    {
        $this->geoLocationService->validAndMerge($data);
        $jobseeker = parent::createModel($data);
        $this->validAndSavePhoto($data, $jobseeker);

        return $jobseeker;
    }

    /**
     * @param array $data
     * @param Model $jobseeker
     * @return mixed
     */
    public function updateModel(array $data, Model $jobseeker)
    {
        $this->validAndSavePhoto($data, $jobseeker);
        $this->geoLocationService->validAndMerge($data);
        return parent::updateModel($data, $jobseeker);
    }

    /**
     * @param Jobseeker $jobseeker
     * @return string
     */
    public function getPhotoUrl(Jobseeker $jobseeker)
    {
        return $this->fileRepository->getPhotoUrl($jobseeker);
    }
}