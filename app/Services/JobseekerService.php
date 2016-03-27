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
    protected $fileRepository;

    /**
     * JobseekerService constructor.
     * @param JobseekerRepository $repository
     * @param JobseekerFileRepository $fileRepository
     */
    function __construct(JobseekerRepository $repository, JobseekerFileRepository $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
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
    public function validAndSavePhoto(array $data, $jobseeker)
    {
        if(array_key_exists('photo', $data)) {
            $this->fileRepository->savePhoto($data['photo'], $jobseeker);
        }
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