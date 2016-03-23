<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 5:52 PM
 */

namespace App\Services;


use App\Entities\Resume;
use App\Repositories\Files\ResumeFileRepository;
use App\Repositories\ResumeRepository;

class ResumeService extends ResourceService
{
    protected $jobseekerService;
    protected $fileRepository;

    /**
     * ResumeService constructor.
     * @param ResumeRepository $repository
     * @param ResumeFileRepository $fileRepository
     * @param JobseekerService $jobseekerService
     */
    function __construct(ResumeRepository $repository, ResumeFileRepository $fileRepository, JobseekerService $jobseekerService)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
        $this->jobseekerService = $jobseekerService;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getAuthResume()
    {
        return $this->repository->findByJobseekerId(auth()->user()->id);
    }

    /**
     * @param Resume $resume
     * @return array
     */
    public function getModelsForm(Resume $resume)
    {
        if($resume->exists) {
            return $resume->toArray() + $resume->jobseeker->toArray();
        }

        return [];
    }

    /**
     * @param array $data
     * @param Resume $resume
     */
    protected function validAndSaveResumeFile(array $data, Resume $resume)
    {
        if(array_key_exists('resume_file', $data)) {
            $this->fileRepository->saveResume($data['resume_file'], $resume);
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createResume(array $data)
    {
        $jobseeker  = $this->jobseekerService->createModel($data);
        $newResume  = $this->newModel($data);
        $resume     = $this->jobseekerService->addNewResume($jobseeker, $newResume);
        $this->validAndSaveResumeFile($data, $resume);

        return $resume;
    }

    /**
     * @param array $data
     * @param Resume $resume
     * @return mixed
     */
    public function updateResume(array $data, Resume $resume)
    {
        $this->jobseekerService->updateModel($data, $resume->jobseeker);
        $resume = $this->updateModel($data, $resume);
        $this->validAndSaveResumeFile($data, $resume);

        return $resume;
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getPhoto(Resume $resume)
    {
        return $this->jobseekerService->getPhotoUrl($resume->jobseeker);
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getResumeFile(Resume $resume)
    {
        return $this->fileRepository->getResumeFileUrl($resume);
    }

}