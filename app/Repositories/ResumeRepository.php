<?php

namespace App\Repositories;



use App\Entities\GeoLocation;
use App\Entities\Resume;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ResumeRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Entities\Resume';
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findByJobseekerId($id)
    {
        return $this->findBy('jobseeker_id', $id);
    }

    /**
     * @param Resume $resume
     */
    public function getJobSkillsSelect(Resume $resume)
    {
        return $resume->skills()->lists('id')->all();
    }

    /**
     * @param Model $resume
     * @param array $skills
     * @return mixed
     */
    public function syncSkills(Model $resume, $skills = array())
    {
        if(is_null($skills)) {
            $skills = array();
        }

        return $resume->skills()->sync($skills);
    }

    /**
     * @param Model $resume
     * @param  \Illuminate\Support\Collection|array  $models
     */
    public function saveStudies(Model $resume, $models)
    {
        $resume->studies()->saveMany($models);
    }

    /**
     * @param Model $resume
     * @param \Illuminate\Support\Collection|array $models
     */
    public function saveExperiences(Model $resume, $models)
    {
        $resume->experiences()->saveMany($models);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllResumes()
    {
        return $this->model->with(['jobseeker', 'skills'])->paginate();
    }

    protected function defaultSearchResumes($skillId = null, $search = null)
    {
        $query = $this->model->with('skills')->frequentJoins($skillId);

        if(! is_null($search)){
            $query->where(function($query) use ($search) {
                $query->where('jobseekers.first_name', 'like', '%'.$search.'%')
                    ->orWhere('jobseekers.last_name', 'like', '%'.$search.'%')
                    ->orWhere('resumes.profile', 'like', '%'.$search.'%');
            });
        }

        return $query;
    }

    /**
     * @param null $skillId
     * @param null $search
     * @return Collection
     */
    public function getSearchResumes($skillId = null, $search = null)
    {
        $query = $this->defaultSearchResumes($skillId, $search);
        return $query->groupBy('user_id')->take(config('app.maxResults'))->get();
    }

    /**
     * @param null $skillId
     * @param GeoLocation|null $location
     * @param null $search
     * @return Collection
     */
    public function getSearchResumesNear($skillId = null, GeoLocation $location = null, $search = null)
    {
        $query = $this->defaultSearchResumes($skillId, $search);

        if(! is_null($location)) {
            $query->selectRawDistance($location->lat, $location->lng)
                ->having('distance', '<', config('app.miles'))
                ->orderBy('distance', 'asc');
        }

        return $query->groupBy('user_id')->take(config('app.maxResults'))->get();
    }


}
