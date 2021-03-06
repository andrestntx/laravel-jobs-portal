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

    protected $profiles = [
        ["name" => "AYUDANTE DE METALMECANICA"],
        ["name" => "AYUDANTE TECNICO DE SOLDADURA"],
        ["name" => "AYUDANTE TECNICO DE PAILERIA"],
        ["name" => "AYUDANTE TECNICO TUBERO"],
        ["name" => "BISELADOR"],
        ["name" => "APAREJADOR MECANICO"],
        ["name" => "ANDAMIERO"],
        ["name" => "PAILERO 1"],
        ["name" => "TUBERO 1"],
        ["name" => "METALISTA CONVEYOR"],
        ["name" => "SOLDADOR CONVEYOR"],
        ["name" => "SOLDADOR 1"],
        ["name" => "SOLDADOR DE REVESTECIMIENTO"],
        ["name" => "PAILERO 1A"],
        ["name" => "TUBERO 1A"],
        ["name" => "SOLADADOR 1A"],
        ["name" => "SOLDADOR ARGONERO"],
        ["name" => "MARINERO OPERADOR"],
        ["name" => "MARINERO"],
        ["name" => "MARINERO COCINERO"],
        ["name" => "MARINERO TIMONEL"],
        ["name" => "MARINERO CAMARERO"],
        ["name" => "PATRON DE BOTE"],
        ["name" => "MOTORISTA"],
        ["name" => "BUZO SEGUNDA"],
        ["name" => "MAQUINISTA EMBARCACION MAYOR"],
        ["name" => "MARINERO DE MAQUI NAS"],
        ["name" => "MECANICO EMBARCACION MENOR"],
        ["name" => "BUZO INDUSTRIAL"],
        ["name" => "SUPERVISOR DE BUSEO"],
        ["name" => "CONTRAMAESTRE"],
        ["name" => "PATRON DE EMBARCACION"],
        ["name" => "MECANICO DE PROPULSION"],
        ["name" => "OPERADOR DE PLANTA"],
        ["name" => "TOMA MUESTRAS"],
        ["name" => "ACEITERO"],
        ["name" => "AYUDANTE DE PATIO"],
        ["name" => "CUÑERO"],
        ["name" => "OPERADOR DE WELL TESTING"],
        ["name" => "ENCUELLADOR"],
        ["name" => "MAQUINISTA DE REACONDICIONAMIENTO DE POZOS"],
        ["name" => "AUXILIAR DE PERFORACION EQUIPO DE FAST MOVING"],
        ["name" => "OPERADOR DE SLICK LINE"],
        ["name" => "ASISTENTE DE PERFORACION"],
        ["name" => "PERFORADOR DE SISMICA"],
        ["name" => "CAPATAZ DE CASA BLANCA SISMICA"],
        ["name" => "SUPERVISOR DE CASA BLANCA SISMICA"],
        ["name" => "AYUDANTE DE DISPARADOR DE SISMICA"],
        ["name" => "CAPATAZ DE TALADRO SISMICA"],
        ["name" => "SUPERVISOR DE TALADRO SISMICA"],
        ["name" => "DISPARADOR SISMICA"],
        ["name" => "CARGA POZO SISMICA"],
        ["name" => "AYUDANTE DE REPARACABLES"],
        ["name" => "COMPRESORISTA SISMICA"],
        ["name" => "CHEQUEADOR DE LINEA SISMICA"],
        ["name" => "MECANICO DE LINEA SISMICA"],
        ["name" => "ESMERILADOR"],
        ["name" => "ELECTRICISTA 1"],
        ["name" => "MECANICO 1"],
        ["name" => "MECANICO 1A"],
        ["name" => "ELECTICISTA 1A"],
        ["name" => "INTRUMENTISTA 1"],
        ["name" => "INSTRUMENTISTA 1A"],
        ["name" => "AYUDANTE TECNICO DE ELECTRICIDAD"],
        ["name" => "AYUDANTE TECNICO DE INSTRUMENTACION"],
        ["name" => "AYUDANTE TECNICO DE TALLER DE BOMBAS"],
        ["name" => "TECNICO MECANICO"],
        ["name" => "TECNICO ELECTRICISTA"],
        ["name" => "TECNICO INSTRUMENTISTA"],
        ["name" => "LINIERO"],
        ["name" => "MECANICO DE CAMPO"],
        ["name" => "AUXILIAR DE VIA PALETERO"],
        ["name" => "CONTROLADOR DE TRÁFICO"],
        ["name" => "FUNCIONARIO DE APOYO A LA OPERACIÓN"],
        ["name" => "CONDUCTOR VEHICULO LIVIANO"],
        ["name" => "OPERADOR DE RANA, MARTILLO"],
        ["name" => "OPERADOR DE EQUIPOS ELECTRICOS"],
        ["name" => "AUXILIAR DE BODEGA"],
        ["name" => "OFICINISTA SISMICA"],
        ["name" => "AYUDANTE TECNICO DE ALBAÑILERIA"],
        ["name" => "CADENERO"],
        ["name" => "OPERADOR DE DESCARGUE"],
        ["name" => "APAREJADOR DE CARGA"],
        ["name" => "AYUDANTE DE OBRA CIVIL"],
        ["name" => "AUXILIAR DE MATERIALES"],
        ["name" => "ALBAÑIL"],
        ["name" => "PINTOR"],
        ["name" => "PLOMERO"],
        ["name" => "RECORREDOR DE POZOS"],
        ["name" => "ALMACENISTA"],
        ["name" => "OPERADOR DE CAMION GRUA"],
        ["name" => "OPERADOR DE MONTACARGA"],
        ["name" => "OPERADOR DE RETRO"],
        ["name" => "OPERADOR DE SISTEMAS CONTRA INCIENDIOS"],
        ["name" => "OPERADOR DE PLANTA DE GAS"],
        ["name" => "OPERADOR DE MOTONIVELADORA"],
        ["name" => "AYUDANTE DE LANCHERO"],
        ["name" => "PATIERO"],
        ["name" => "OBRERO"],
        ["name" => "AUXILIAR DE ACTAS SISMICA"],
        ["name" => "PORTAPRISMA"],
        ["name" => "CARPINTERO"],
        ["name" => "CAMPAMENTERO"],
        ["name" => "CAPATAS DE TRANSPORTE SISMICA"],
        ["name" => "MOCHILERO SISMICA"],
        ["name" => "JEFE DE CAMPAMENTEROS"],
        ["name" => "CAPATAZ DE TROCHA"],
        ["name" => "DATAIN SISMICA"],
        ["name" => "OFICIAL DE OBRA"],
        ["name" => "PINTOR SANBLASTING"],
        ["name" => "DOBLADOR"],
        ["name" => "ASISTENTE ADMINISTRATIVO"],
        ["name" => "AYUDANTE CAMPAMENTO"],
        ["name" => "MOTOSIERRISTA"],
        ["name" => "APUNTA TIEMPO"],
        ["name" => "AYUDANTE DE CAMION DE VACIO"],
        ["name" => "OPERADOR DE TOLVA"],
        ["name" => "OPERADOR DE BOMBA NEUMATICA"],
        ["name" => "AUXILIAR DE LOGISTICA"],
        ["name" => "NAVEGANTE SISMICA"],
        ["name" => "RADIOPERADOR"],
        ["name" => "COORDINADOR DE EXPLOSIVOS SISMICA"],
        ["name" => "OPERADOR DE TRACTOR"],
        ["name" => "SUPERVISOR DE CAMPO"],
        ["name" => "RESCATISTA SOCORRISTA"],
        ["name" => "CONDUCTOR DE AMBULANCIA"],
        ["name" => "OFICIONISTA"],
        ["name" => "MAESTRO DE OBRA CIVIL"],
        ["name" => "AUXILIAR DE ENFERMERIA"],
        ["name" => "CONTROLADOR DE MAQUINARIA"],
        ["name" => "CUIDADOR DE ANIMALES"],
        ["name" => "CUIDADOR DE NIÑOS"],
        ["name" => "SABEDOR DE PLANTAS"],
        ["name" => "AYUDANTE DE MANTENIMIENTO DE VEHICULOS"],
        ["name" => "AUXILIAR DE INSTALACION DE COMPUTADORES"],
        ["name" => "AYUDANTE DE CARGUE Y DESCARGUE"],
        ["name" => "TECNICO ADMINISTRATIVO"],
        ["name" => "TECNICO OPERATIVO"],
        ["name" => "SECRETARIA"],
        ["name" => "BODEGERO"],
        ["name" => "TECNICO INTEGRAL"],
        ["name" => "INGENIERO AMBIENTAL"],
        ["name" => "INGENIERO CIVIL"],
        ["name" => "ARQUITECTO"],
        ["name" => "ABOGADO"],
        ["name" => "TECNICO DE PERFORACION DE POZOS PETROLEROS Y GAS"],
        ["name" => "TECNICO DE SALUD OCUPACIONAL"],
        ["name" => "TECNICO DE PRODUCCION DE POZOS PETROLEROS Y GAS"],
        ["name" => "TECNICO EN PROCESOS DE REFINACION DE PETROLEO Y GAS"],
        ["name" => "TECNICO HSEQ"],
        ["name" => "AUXILIAR DE ACTAS"],
        ["name" => "CAPATAZ DE REGISTRO"],
        ["name" => "CAPATAZ DE TROCHA"],
        ["name" => "CAPATAZ DE RECOGIDA DE CABLE SISMICA"],
        ["name" => "CAPATAZ DE PICA"],
        ["name" => "CAPATAZ DE RESTAURACION SISMICA"],
        ["name" => "OPERADOR DE PLANTA DE TRATAMIENTO DE AGUAS"],
        ["name" => "AUXILAR DE LABORATORIO"],
        ["name" => "AUXILIAR DE TIERRA"]
    ];

    protected $occupations = [
        ['name' => 'prueba 1'],
        ['name' => 'prueba 2'],
        ['name' => 'prueba 3'],
        ['name' => 'prueba 4'],
        ['name' => 'prueba 5'],
        ['name' => 'prueba 6'],
        ['name' => 'prueba 7']
    ];

    protected $activities = [
        ['name' => 'Remisión Gestión Empleo'],
        ['name' => 'Remisión Entrevista Orientación'],
        ['name' => 'Remisión talleres orientación'],
        ['name' => 'Remisión Formación'],
        ['name' => 'Remisión talleres de Emprendimiento'],
        ['name' => 'Remisión servicios complementarios'],
        ['name' => 'PQRS']
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

        foreach ($this->profiles as $profile) {
            factory(\App\Entities\Profile::class)->create($profile);
        }

        foreach ($this->occupations as $occupation) {
            factory(\App\Entities\Occupation::class)->create($occupation);
        }

        foreach ($this->activities as $activity) {
            factory(\App\Entities\Activity::class)->create($activity);
        }

        factory(\App\Entities\GeoLocation::class, 5)->create([
            'is_search' => true
        ]);
    }
}
