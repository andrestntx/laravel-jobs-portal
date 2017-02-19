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
        ['name' => 'portal_nombre', 'alias' => 'Nombre del Portal', 'value' => 'Portal Trabajo'],
        ['name' => 'portal_logo', 'alias' => 'Logo del Portal', 'value' => '/images/logo.png', 'file' => true],
        ['name' => 'portal_descripcion', 'alias' => 'Descripción del Portal', 'value' => 'texto', 'textarea' => true],
        ['name' => 'empresa_nombre', 'alias' => 'Nombre de la Empresa', 'value' => 'Gestacol'],
        ['name' => 'empresa_direccion', 'alias' => 'Dirección de la Empresa', 'value' => 'Carrera 38'],
        ['name' => 'empresa_nit', 'alias' => 'Nit de la Empresa', 'value' => '090398982'],
        ['name' => 'empresa_objeto_social', 'alias' => 'Objeto Social de la Empresa', 'value' => 'colegios'],
        ['name' => 'empresa_web', 'alias' => 'Dirección Web de la Empresa', 'value' => 'www.gestacol.com'],
        ['name' => 'empresa_email', 'alias' => 'Email de la Empresa', 'value' => 'gerencia@gestacol.com'],
        ['name' => 'empresa_telefono', 'alias' => 'Teléfono de la Empresa', 'value' => '435675'],
        ['name' => 'empresa_logo', 'alias' => 'Logo de la Empresa', 'value' => 'www.gestacol.com/logo'],
        ['name' => 'represente_identificacion', 'alias' => 'Identificación del Representante Legal', 'value' => '3456'],
        ['name' => 'represente_nombre', 'alias' => 'Nombre del Representante Legal', 'value' => 'Juan Pardo'],
        ['name' => 'datos_complementarios', 'alias' => 'Datos Complementarios', 'value' => 'xx', 'textarea' => true]
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