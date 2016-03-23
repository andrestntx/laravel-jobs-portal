<?php

use App\Entities\Job;
use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Company;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()
            ->each(function($user){
                $user->jobseeker()
                    ->save(factory(\App\Entities\Jobseeker::class)->make())
                        ->resumes()->save(factory(\App\Entities\Resume::class)->make());
            });

        factory(User::class, 'employer', 5)
            ->create()
            ->each(function($user) {
                $company = $user->companies()->save(factory(Company::class)->make());
                $company->jobs()->saveMany(factory(Job::class, 15)->make());
            });
    }
}
