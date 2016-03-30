<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/16/16
 * Time: 5:52 PM
 */

namespace App\Services;


use App\Entities\GeoLocation;
use App\Entities\Resume;
use App\Entities\User;
use App\Repositories\Files\ResumeFileRepository;
use App\Repositories\ResumeRepository;
use Illuminate\Database\Eloquent\Model;

class ResumeService extends ResourceService
{
    protected $fileRepository;

    /**
     * ResumeService constructor.
     * @param ResumeRepository $repository
     * @param ResumeFileRepository $fileRepository
     */
    function __construct(ResumeRepository $repository, ResumeFileRepository $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getAuthResume()
    {
        return $this->getResume(auth()->user());
    }

    /**
     * @param User $user
     * @return Model|null|static
     */
    public function getResume(User $user)
    {
        return $this->repository->findByJobseekerId($user->id);
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
    public function validAndSaveResumeFile(array $data, Resume $resume)
    {
        if(array_key_exists('resume_file', $data)) {
            $this->fileRepository->saveResume($data['resume_file'], $resume);
        }
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getResumeFile(Resume $resume)
    {
        return $this->fileRepository->getResumeFileUrl($resume);
    }

    /**
     * @param Resume $resume
     * @return mixed
     */
    public function getResumeSkillsSelect(Resume $resume)
    {
        return $this->repository->getJobSkillsSelect($resume);
    }

    /**
     * @param Model $resume
     * @param array|null $skills
     * @return mixed
     */
    public function syncSkills(Model $resume, $skills = array())
    {
        /*if(is_null($skills)) {
            $skills = array();
        }*/

        return $this->repository->syncSkills($resume, $skills);
    }

    /**
     * @param Model $resume
     * @param  \Illuminate\Support\Collection|array  $models
     */
    public function addNewStudies(Model $resume, $models)
    {
        $this->repository->saveStudies($resume, $models);
    }

    /**
     * @param Model $resume
     * @param \Illuminate\Support\Collection|array  $models
     */
    public function addNewExperiences(Model $resume, $models)
    {
        $this->repository->saveExperiences($resume, $models);
    }

    /**
     * @param null $skillId
     * @param GeoLocation|null $geoLocation
     * @param null $search
     * @return array
     */
    public function getSearchResumes($skillId = null, GeoLocation $geoLocation = null, $search = null)
    {
        if(is_null($geoLocation)) {
            $resumes = $this->repository->getSearchResumes($skillId, $search);
        }
        else {
            $resumes = $this->repository->getSearchResumesNear($skillId, $geoLocation, $search);
        }

        return ['resumes' => $this->repository->customPaginateCollection($resumes), 'markers' => $resumes->toJson(), 'total' => $this->repository->count()];
    }

}