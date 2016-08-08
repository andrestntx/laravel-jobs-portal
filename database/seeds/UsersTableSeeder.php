<?php

use App\Entities\Job;
use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Company;

class UsersTableSeeder extends Seeder
{
    protected  $faker;

    /**
     * UsersTableSeeder constructor.
     * @param $faker
     */
    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->faker;

        factory(User::class, 30)->create()
            ->each(function($user) use ($faker){
                $jobseeker  = $user->jobseeker()->save(factory(\App\Entities\Jobseeker::class)->make());
                $jobseeker->geoLocation()->associate(factory(\App\Entities\GeoLocation::class)->create())->save();
                $resume  = $jobseeker->resumes()->save(factory(\App\Entities\Resume::class)->make());
                $resume->studies()->saveMany(factory(\App\Entities\Study::class, 2)->make());
                $resume->experiences()->saveMany(factory(\App\Entities\Experience::class, 2)->make());
            });

        factory(User::class, 'employer', 10)
            ->create()
            ->each(function($user) {
                $company = $user->companies()->save(factory(Company::class)->make());
                $company->jobs()->saveMany(factory(Job::class, 5)->make())
                    ->each(function($job) {
                        $job->geoLocation()->associate(factory(\App\Entities\GeoLocation::class)->create())->save();
                    });
            });

        factory(\App\Entities\Application::class, 30)->create();
        
    }
}
