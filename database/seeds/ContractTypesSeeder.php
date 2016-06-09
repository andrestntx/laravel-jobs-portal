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
        ['name' => 'Tiempo Completo',   'description' => 'Contrato de Tiempo Completo'],
        ['name' => 'Medio Tiempo',      'description' => 'Solo se dedica a 4 horas laborales diarias'],
        ['name' => 'Orden de Prestación de Servicios (OPS)', 'description' => 'Contrato de Prestación de Servicios'],
        ['name' => 'Freelance',         'description' => 'Contrato de trabajo remoto']
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