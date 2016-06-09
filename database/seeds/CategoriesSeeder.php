<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    protected $companyCategories = [
        ['name' => 'Desarrollo de Software', 'description' => 'Desarrollo de software y tecnología'],
        ['name' => 'Incursión de Yacimientos', 'description' => 'Exploración de posos'],
        ['name' => 'Manejo de Residuos Industriales', 'description' => 'Manejo de desechos del sector hidrocarburos'],
        ['name' => 'Mantenimiento de Maquinaria e Infraestructura', 'description' => 'Mantenimiento de Maquinaria de Exploración'],
        ['name' => 'Control y Evaluación de Personal', 'description' => 'Verificación de Personal']
    ];

    protected $occupations = [
        ['name' => 'Soldador'],
        ['name' => 'Servicios Generales'],
        ['name' => 'Recolector de Residuos Contaminantes'],
        ['name' => 'Paletero de Vías'],
        ['name' => 'Operador de Taladro'],
        ['name' => 'Operador de Grua'],
        ['name' => 'Operador de Cadenas (Cadenero)'],
        ['name' => 'Operador de BullDoser'],
        ['name' => 'Mecánico'],
        ['name' => 'Instrumentador'],
        ['name' => 'Inspector de Posos'],
        ['name' => 'Guadañador'],
        ['name' => 'Asistente de Soldadura'],
        ['name' => 'Asistente de Exploración'],
        ['name' => 'Acoplador de Ejes']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->companyCategories as $category) {
            factory(\App\Entities\CompanyCategory::class)->create($category);
        }

        foreach ($this->occupations as $occupation) {
            factory(\App\Entities\Occupation::class)->create($occupation);
        }

        factory(\App\Entities\GeoLocation::class, 5)->create([
            'is_search' => true
        ]);
    }
}
