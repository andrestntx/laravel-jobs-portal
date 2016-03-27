<?php

/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/23/16
 * Time: 3:36 PM
 */

use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateJob()
    {
        $this->createCategories();
        $user = $this->createTestUser('employer');
        $user->companies()->save(factory(\App\Entities\Company::class)->make());

        $this->actingAs($user)
            ->visit('/my-company')
            ->click('Nueva Oferta')
            ->type('NewJobTest',  'name')
            ->select('1',  'occupation_id')
            ->select('1',  'contract_type_id')
            ->type('Un bonito empleo',  'description')
            ->press('save')
            ->seePageIs(route('companies.jobs.show', [1, 1]))
            ->seeInDatabase('jobs', [
                'id' => '1',
                'name' => 'NewJobTest',
                'occupation_id' => '1',
                'contract_type_id' => '1',
                'company_id' => '1'
            ]);
    }
}