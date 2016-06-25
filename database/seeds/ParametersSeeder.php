<?php

use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: andrestntx
 * Date: 3/25/16
 * Time: 8:34 AM
 */
class ParametersSeeder extends Seeder
{

    protected $parameters = [
        ['name' => 'portal_nombre', 'value' => 'Portal Trabajo'],
        ['name' => 'portal_logo', 'value' => '/images/logo.png', 'file' => true],
        ['name' => 'empresa_nombre', 'value' => 'Gestacol'],
        ['name' => 'empresa_direccion', 'value' => 'Carrera 38'],
        ['name' => 'empresa_nit', 'value' => '090398982'],
        ['name' => 'empresa_objeto_social', 'value' => 'colegios'],
        ['name' => 'empresa_web', 'value' => 'www.gestacol.com'],
        ['name' => 'empresa_email', 'value' => 'gerencia@gestacol.com'],
        ['name' => 'empresa_telefono', 'value' => '435675'],
        ['name' => 'empresa_logo', 'value' => 'www.gestacol.com/logo'],
        ['name' => 'gerente_identificacion', 'value' => '93489859'],
        ['name' => 'gerente_nombre', 'value' => 'Pedro Gomez'],
        ['name' => 'represente_identificacion', 'value' => '3456'],
        ['name' => 'represente_nombre', 'value' => 'Juan Pardo'],
        ['name' => 'datos_complementarios', 'value' => 'xx'],
        ['name' => 'portal_descripcion', 'value' => 'texto']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->parameters as $p) {
            factory(\App\Entities\Parameter::class)->create($p);
        }
    }
}