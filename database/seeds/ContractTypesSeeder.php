<?php

use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/25/16
 * Time: 8:34 AM
 */
class ContractTypesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\ContractType::class)->create([
            'name'  => 'tiempo completo'
        ]);

        factory(\App\Entities\ContractType::class)->create([
            'name'  => 'medio tiempo'
        ]);

        factory(\App\Entities\ContractType::class)->create([
            'name'  => 'OPS'
        ]);

        factory(\App\Entities\ContractType::class)->create([
            'name'  => 'frelance'
        ]);
    }
}