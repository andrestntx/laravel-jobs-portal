<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AutTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testJobseekerRegister()
    {
        $this->visit('/register')
            ->type('testUsername', 'username')
            ->type('testName', 'name')
            ->type('testEmail', 'email')
            ->type('testPassword', 'password')
            ->type('testPassword', 'password_confirmation')
            ->check('terms-jobseeker')
            ->type('jobseeker', 'role')
            ->press('register-jobseeker')
            ->seePageIs('/my-resume');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEmployerRegister()
    {
        $this->visit('/register')
            ->type('testUsername', 'username')
            ->type('testName', 'name')
            ->type('testEmail', 'email')
            ->type('testCompany', 'company')
            ->type('testPassword', 'password')
            ->type('testPassword', 'password_confirmation')
            ->check('terms-employer')
            ->type('employer', 'role')
            ->press('register-employer')
            ->seePageIs('my-company');
    }
}
