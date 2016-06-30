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
use Illuminate\Support\Facades\Storage;

class ResumeFileRepository extends BaseFileRepostory
{
    protected $path = "storage/jobseekers";

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
        if($this->hasResumePdf($resume)) {
            return '/' . $this->getPathResume($resume). "/resume.pdf";
        }

        return '#';
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getResumeFile(Resume $resume)
    {
        if($this->hasResumePdf($resume)) {
            return Storage::get($this->getResumeFileUrl($resume));
        }

        return null;
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function hasResumePdf(Resume $resume)
    {
        return Storage::exists('/' . $this->getPathResume($resume). "/resume.pdf");
    }

    /**
     * @param UploadedFile $vaccineFile
     * @param Resume $resume
     */
    public function saveVaccine(UploadedFile $vaccineFile, Resume $resume)
    {
        $this->saveFile($vaccineFile, $this->getPathResume($resume), 'vaccine.pdf');
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getVaccineFileUrl(Resume $resume)
    {
        if($this->hasVaccinePdf($resume)) {
            return '/' . $this->getPathResume($resume). "/vaccine.pdf";
        }

        return '#';
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function getVaccineFile(Resume $resume)
    {
        if($this->hasVaccinePdf($resume)) {
            return Storage::get($this->getVaccineFileUrl($resume));
        }

        return null;
    }

    /**
     * @param Resume $resume
     * @return string
     */
    public function hasVaccinePdf(Resume $resume)
    {
        return Storage::exists('/' . $this->getPathResume($resume). "/vaccine.pdf");
    }
}