<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/22/16
 * Time: 7:47 PM
 */

namespace App\Repositories\Files;

use App\Entities\Jobseeker;
use Illuminate\Http\UploadedFile;

class JobseekerFileRepository extends BaseFileRepostory
{
    protected $path = "storage/jobseekers";
    protected $defaultPhoto = "images/default.jpg";

    public function getPathJobseeker($user_id)
    {
        return $this->getPath() . "/" . $user_id;
    }

    public function savePhoto(UploadedFile $photoFile, Jobseeker $jobseeker)
    {
        $this->saveFile($photoFile, $this->getPathJobseeker($jobseeker->user_id), 'photo.jpg');
    }

    public function getPhotoUrl(Jobseeker $jobseeker)
    {
        return $this->getPhotoUrlId($jobseeker->user_id);
    }

    public function getPhotoUrlId($user_id)
    {
        return $this->getFileOrDefault($this->getPathJobseeker($user_id). "/photo.jpg", $this->defaultPhoto);
    }
}