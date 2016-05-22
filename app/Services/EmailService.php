<?php
/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 5/21/16
 * Time: 7:37 PM
 */

namespace App\Services;

use App\Entities\Application;
use App\Entities\Job;
use App\Entities\Resume;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    protected static $fromEmail = 'noresponder@uncorreo.co';
    protected static $fromName = 'Portal de empleo';
    protected static $cc = 'andres@dondepauto.co';

    /**
     * @param Resume $resume
     * @param Job $job
     * @param Application $application
     * @param $pathToFile
     */
    public function sendResume(Resume $resume, Job $job, Application $application, $pathToFile)
    {
        $fromEmail = self::$fromEmail;
        $fromName = self::$fromName;

        Mail::send('emails.apply-company', ['resume' => $resume, 'job' => $job, 'application' => $application], function ($m) use ($job, $resume, $fromEmail, $fromName, $pathToFile) {
            $m->from($fromEmail, $fromName);
            $m->to($job->email, $job->company->name)
                ->subject('Haz recibido una hoja de vida de ' . $resume->jobseeker->full_name)
                ->cc(self::$cc)
                ->attach(url($pathToFile));
        });

        Mail::send('emails.apply-jobseeker', ['resume' => $resume, 'job' => $job], function ($m) use ($job, $resume, $fromEmail, $fromName) {
            $m->from($fromEmail, $fromName);
            $m->to($resume->jobseeker->email, $resume->jobseeker->full_name)
                ->subject('Ha sido enviada su hoja de vida a la empresa ' . $job->company->name)
                ->cc(self::$cc);
        });
    }
}