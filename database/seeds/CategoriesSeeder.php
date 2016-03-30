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
        factory(\App\Entities\Occupation::class, 15)->create();
        factory(\App\Entities\Skill::class, 25)->create();
        factory(\App\Entities\GeoLocation::class, 5)->create([
            'is_search' => true
        ]);
    }
}
