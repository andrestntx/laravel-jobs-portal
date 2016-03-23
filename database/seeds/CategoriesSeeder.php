<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\JobCategory::class, 5)->create();
        factory(\App\Entities\CompanyCategory::class, 5)->create();
        factory(\App\Entities\ContractType::class, 5)->create();
    }
}
