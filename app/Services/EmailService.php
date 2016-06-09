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
use App\Entities\User;
use App\Repositories\ParameterRepository;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    protected $fromEmail = 'noresponder@uncorreo.co';
    protected $fromName = 'Portal de empleo';
    protected $parameterRepository;

    protected static $cc = 'andres@dondepauto.co';

    /**
     * EmailService constructor.
     * @param ParameterRepository $parameterRepository
     */
    public function __construct(ParameterRepository $parameterRepository)
    {
        $this->fromName = $parameterRepository->getValue('portal_nombre');
        $this->fromEmail = $parameterRepository->getValue('empresa_email');
    }


    /**
     * @param Resume $resume
     * @param Job $job
     * @param Application $application
     * @param $pathToFile
     */
    public function sendResume(Resume $resume, Job $job, Application $application, $pathToFile)
    {
        $fromEmail = $this->fromEmail;
        $fromName = $this->fromName;

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

    /**
     * @param User $user
     */
    public function welcomeUser(User $user)
    {
        $fromEmail = $this->fromEmail;
        $fromName = $this->fromName;

        Mail::send('emails.welcome', ['user' => $user,], function ($m) use ($user, $fromEmail, $fromName) {
            $m->from($fromEmail, $fromName);
            $m->to($user->email, $user->full_name)
                ->subject('Bienvenido ' . $user->name)
                ->cc(self::$cc);
        });
    }
}