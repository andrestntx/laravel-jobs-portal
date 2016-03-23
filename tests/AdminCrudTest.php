<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminCrudTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCompanyCategory()
    {
    	$user = $this->createTestUser();

        $this->actingAs($user)
            ->visit('/admin/company-categories')
            ->see('Categorías de Empresa')
            ->click('Nueva Categoría')
         	->seePageIs('/admin/company-categories/create')
         	->see('Categoría de Empresa')
         	->type('categoryTest', 'name')
         	->type('Description categoryTest', 'description')
         	->press('Guardar')
         	->seePageIs('/admin/company-categories')
			->seeInDatabase('company_categories', ['name' => 'categoryTest'])
			->see('categoryTest')
			->click('categoryTest')
			->type('categoryTestEdit', 'name')
			->press('Guardar')
			->seePageIs('/admin/company-categories')
			->seeInDatabase('company_categories', ['name' => 'categoryTestEdit'])
			->see('categoryTestEdit');
    }

	public function testJobCategory()
	{
		$user = $this->createTestUser();

		$this->actingAs($user)
			->visit('/admin/job-categories')
			->see('Categorías de Trabajo')
			->click('Nueva Categoría')
			->seePageIs('/admin/job-categories/create')
			->see('Categoría de Trabajo')
			->type('categoryTest', 'name')
			->type('Description categoryTest', 'description')
			->press('Guardar')
			->seePageIs('/admin/job-categories')
			->seeInDatabase('job_categories', ['name' => 'categoryTest'])
			->see('categoryTest')
			->click('categoryTest')
			->type('categoryTestEdit', 'name')
			->press('Guardar')
			->seePageIs('/admin/job-categories')
			->seeInDatabase('job_categories', ['name' => 'categoryTestEdit'])
			->see('categoryTestEdit');
	}

	public function testContractType(){
		$user = $this->createTestUser();

		$this->actingAs($user)
			->visit('/admin/contract-types')
			->see('Tipos de Contrato')
			->click('Nuevo Tipo de Contrato')
			->seePageIs('/admin/contract-types/create')
			->see('Tipo de Contrato')
			->type('typeTest', 'name')
			->type('Description typeTest', 'description')
			->press('Guardar')
			->seePageIs('/admin/contract-types')
			->seeInDatabase('contract_types', ['name' => 'typeTest'])
			->see('typeTest')
			->click('typeTest')
			->type('typeTestEdit', 'name')
			->press('Guardar')
			->seePageIs('/admin/contract-types')
			->seeInDatabase('contract_types', ['name' => 'typeTestEdit'])
			->see('typeTestEdit');
	}

	public function testSkill(){
		$user = $this->createTestUser();

		$this->actingAs($user)
			->visit('/admin/skills')
			->see('Ocupaciones')
			->click('Nueva Ocupación')
			->seePageIs('/admin/skills/create')
			->see('Ocupación')
			->type('skillTest', 'name')
			->press('Guardar')
			->seePageIs('/admin/skills')
			->seeInDatabase('skills', ['name' => 'skillTest'])
			->see('skillTest')
			->click('skillTest')
			->type('skillTestEdit', 'name')
			->press('Guardar')
			->seePageIs('/admin/skills')
			->seeInDatabase('skills', ['name' => 'skillTestEdit'])
			->see('skillTestEdit');
	}
}

