<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResumeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUrlMyResume()
    {
        $user = $this->createTestUser('jobseeker');

        $this->actingAs($user)
            ->visit('/my-resume')
            ->seePageIs('/resumes/create');

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEditUrlMyResume()
    {
        $user = $this->createTestUser('jobseeker');

        $user->jobseeker()
            ->save(factory(App\Entities\Jobseeker::class)->make())
                ->resumes()->save(factory(App\Entities\Resume::class)->make());

        $this->actingAs($user)
            ->visit('/my-resume')
            ->seePageIs(route('resumes.show', $user->id));

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateResume()
    {
        $user = $this->createTestUser('jobseeker');

        $this->actingAs($user)
            ->visit('/my-resume')
            ->seePageIs('/resumes/create')
            ->type('1121895025',  'doc')
            ->type('Andres',  'first_name')
            ->type('Pinzon',  'last_name')
            ->type('3142308171',  'phone')
            ->type('andres@gmail.com',  'email')
            ->type('Villavicencio',  'address')
            ->type('Soy un buen empleado',  'profile')
            ->type('1200000',  'wage_aspiration')
            ->press('save')
            ->seeInDatabase('jobseekers', ['first_name' => 'Andres', 'doc' => '1121895025'])
            ->seeInDatabase('resumes', ['profile' => 'Soy un buen empleado', 'jobseeker_id' => $user->id]);
    }
}
