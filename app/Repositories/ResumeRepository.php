<?php

namespace App\Repositories;



use App\Entities\GeoLocation;
use App\Entities\Occupation;
use App\Entities\Profile;
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
        return $this->model->with(['jobseeker'])->paginate();
    }


    /**
     * @param Occupation|null $occupation
     * @param Profile|null $profile
     * @param int $experience
     * @param null $search
     * @return mixed
     */
    protected function defaultSearchResumes(Occupation $occupation = null, Profile $profile = null, $experience = 0, $search = null)
    {
        $query = $this->model->frequentJoins();

        if(! is_null($occupation)) {
            $query->where('occupation_id', $occupation->id);
        }

        if(! is_null($profile)) {
            $query->where('profile_id', $profile->id);
        }

        if(! is_null($search)){
            $query->where(function($query) use ($search) {
                $query->where('jobseekers.first_name', 'like', '%'.$search.'%')
                    ->orWhere('jobseekers.last_name', 'like', '%'.$search.'%')
                    ->orWhere(\DB::raw('CONCAT(jobseekers.first_name," ",jobseekers.last_name)'), 'like', '%'.$search.'%')
                    ->orWhere('resumes.profile', 'like', '%'.$search.'%')
                    ->orWhere('resumes.skills', 'like', '%'.$search.'%')
                    ->orWhere('resumes.study_title', 'like', '%'.$search.'%')
                    ->orWhere('resumes.vaccines', 'like', '%'.$search.'%')
                    ->Orwhere('geo_locations.name', 'like', '%'.$search.'%')
                    ->Orwhere('geo_locations.formatted_address', 'like', '%'.$search.'%');
            });
        }

        $query->where('experience', '>=', $experience);

        return $query;
    }

    /**
     * @param Occupation|null $occupation
     * @param Profile|null $profile
     * @param int $experience
     * @param null $search
     * @return mixed
     */
    public function getSearchResumes(Occupation $occupation = null, Profile $profile = null, $experience = 0, $search = null)
    {
        $query = $this->defaultSearchResumes($occupation, $profile, $experience, $search);
        return $query->groupBy('user_id')->take(config('app.maxResults'))->get();
    }

    /**
     * @return array
     */
    public function getExperienceRange()
    {
        $min = 0;
        $max = 0;

        if($this->model->count() > 0) {
            $min = $this->model->select('experience')->orderBy('experience', 'asc')->take(1)->first()->experience;
            $max = $this->model->select('experience')->orderBy('experience', 'desc')->take(1)->first()->experience;
        }

        return ['experienceMin' => $min, 'experienceMax' => $max];
    }


}
