<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/24/16
 * Time: 9:03 AM
 */

namespace App\Facades;


use App\Entities\Jobseeker;
use App\Entities\Resume;
use App\Services\ExperienceService;
use App\Services\GeoLocationService;
use App\Services\JobseekerService;
use App\Services\ResumeService;
use App\Services\StudyService;
use Illuminate\Database\Eloquent\Model;

class JobseekerFacade
{
    /**
     * @var ResumeService
     */
    protected $resumeService;

    /**
     * @var JobseekerService
     */
    protected $jobseekerService;

    /**
     * @var GeoLocationService
     */
    protected $geoLocationService;

    /**
     * @var StudyService
     */
    protected $studyService;

    /**
     * @var ExperienceService
     */
    protected $experienceService;

    /**
     * JobseekerFacade constructor.
     * @param ResumeService $resumeService
     * @param JobseekerService $jobseekerService
     * @param GeoLocationService $geoLocationService
     * @param StudyService $studyService
     * @param ExperienceService $experienceService
     */
    public function __construct(ResumeService $resumeService, JobseekerService $jobseekerService,
                                GeoLocationService $geoLocationService, StudyService $studyService,
                                ExperienceService $experienceService)
    {
        $this->resumeService = $resumeService;
        $this->geoLocationService = $geoLocationService;
        $this->jobseekerService = $jobseekerService;
        $this->studyService = $studyService;
        $this->experienceService = $experienceService;
    }

    /**
     * @param Jobseeker $jobseeker
     * @return string
     */
    public function getPhoto(Jobseeker $jobseeker)
    {
        return $this->jobseekerService->getPhotoUrl($jobseeker);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function createJobseeker(array $data)
    {
        $data = $this->geoLocationService->validAndMerge($data);
        $jobseeker = $this->jobseekerService->createModel($data);
        $this->jobseekerService->validAndSavePhoto($data, $jobseeker);

        return $jobseeker;
    }

    /**
     * @param array $data
     * @param Model $jobseeker
     * @return mixed
     */
    protected function updateJobseeker(array $data, Model $jobseeker)
    {
        $this->jobseekerService->validAndSavePhoto($data, $jobseeker);
        $data = $this->geoLocationService->validAndMerge($data);
        return $this->jobseekerService->updateModel($data, $jobseeker);
    }

    /**
     * @param array $newStudies
     * @param Resume $resume
     */
    protected function addNewStudies(array $newStudies = null, Resume $resume)
    {
        if(! is_null($newStudies)) {
            $newStudies = $this->studyService->getNewStudies($newStudies);
            $this->resumeService->addNewStudies($resume, $newStudies);
        }
    }

    /**
     * @param array|null $newExperiences
     * @param Resume $resume
     */
    protected function addNewExperiences(array $newExperiences = null, Resume $resume)
    {
        if(! is_null($newExperiences)) {
            $newExperiences = $this->experienceService->getNewExperiences($newExperiences);
            $this->resumeService->addNewExperiences($resume, $newExperiences);
        }
    }

    /**
     * @param array|null $studies
     */
    protected function updateStudies(array $studies = null)
    {
        if(! is_null($studies)) {
            $this->studyService->updateStudies($studies);
        }
    }

    /**
     * @param array|null $experiences
     */
    protected function updateExperiences(array $experiences = null)
    {
        if(! is_null($experiences)) {
            $this->experienceService->updateExperiences($experiences);
        }
    }

    /**
     * @param array $dataResume
     * @param array|null $skills
     * @param array $newStudies
     * @param array $newExperiences
     * @return mixed
     */
    public function createResume(array $dataResume, $skills = array(), array $newStudies = null, array $newExperiences = null)
    {
        $jobseeker  = $this->createJobseeker($dataResume);
        $newResume  = $this->resumeService->newModel($dataResume);
        $resume     = $this->jobseekerService->addNewResume($jobseeker, $newResume);

        $this->resumeService->syncSkills($resume, $skills);
        $this->addNewStudies($newStudies, $resume);
        $this->addNewExperiences($newExperiences, $resume);
        $this->resumeService->validAndSaveResumeFile($dataResume, $resume);

        return $resume;
    }

    /**
     * @param Resume $resume
     * @param array $dataResume
     * @param array $skills
     * @param array $newStudies
     * @param array $studies
     * @param array $newExperiences
     * @param array $experiences
     * @return mixed
     */
    public function updateResume(Resume $resume, array $dataResume, $skills = array(), array $newStudies = null, array $studies = null,
                                    array $newExperiences = null, array $experiences = null)
    {
        $this->updateJobseeker($dataResume, $resume->jobseeker);
        $this->resumeService->syncSkills($resume, $skills);

        $this->addNewStudies($newStudies, $resume);
        $this->updateStudies($studies);

        $this->addNewExperiences($newExperiences, $resume);
        $this->updateExperiences($experiences);

        $resume = $this->resumeService->updateModel($dataResume, $resume);
        $this->resumeService->validAndSaveResumeFile($dataResume, $resume);

        return $resume;
    }


}