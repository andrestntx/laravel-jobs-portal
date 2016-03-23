<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/22/16
 * Time: 8:29 PM
 */

namespace App\Repositories\Files;


use App\Entities\Resume;
use Illuminate\Http\UploadedFile;

class ResumeFileRepository extends BaseFileRepostory
{
    protected $path = "jobseekers";

    /**
     * @param Resume $resume
     * @return string
     */
    public function getPathResume(Resume $resume)
    {
        return $this->getPath() . "/" . $resume->jobseeker_id . "/resumes/" . $resume->id;
    }

    /**
     * @param UploadedFile $resumeFile
     * @param Resume $resume
     */
    public function saveResume(UploadedFile $resumeFile, Resume $resume)
    {
        $this->saveFile($resumeFile, $this->getPathResume($resume), 'resume.pdf');
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getResumeFileUrl(Resume $resume)
    {
        return '/' . $this->getPathResume($resume). "/resume.pdf";
    }
}