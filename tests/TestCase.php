<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function createTestUser($role = 'admin')
    {
        return factory(App\Entities\User::class)->create([
            'role'  => $role
        ]);
    }

    public function createCategories()
    {
        factory(\App\Entities\JobCategory::class, 5)->create();
        factory(\App\Entities\CompanyCategory::class, 5)->create();
        factory(\App\Entities\ContractType::class, 5)->create();
        factory(\App\Entities\Occupation::class, 15)->create();
        factory(\App\Entities\Skill::class, 15)->create();
    }
}
