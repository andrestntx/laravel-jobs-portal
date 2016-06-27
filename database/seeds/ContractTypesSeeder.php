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

    protected $types = [
        ['name' => 'Contrato laboral',   'description' => 'Contrato laboral'],
        ['name' => 'Orden de Prestación de Servicios', 'description' => 'Orden de Prestación de Servicios'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type) {
            factory(\App\Entities\ContractType::class)->create($type);
        }
    }
}