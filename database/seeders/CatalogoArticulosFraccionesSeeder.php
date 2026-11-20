<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoArticulosFraccionesSeeder extends Seeder
{
    /**
     * Ejecuta la sincronización de catálogos en producción.
     * Regla: Si el elemento ya existe, NO lo inserta.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $articulos = array (
  0 => 
  array (
    'Id' => 1,
    'NombreArticulo' => '76',
    'EstructuraCarpeta' => '76',
    'Titulo' => '76',
  ),
  1 => 
  array (
    'Id' => 2,
    'NombreArticulo' => '78',
    'EstructuraCarpeta' => '78',
    'Titulo' => '78',
  ),
  2 => 
  array (
    'Id' => 3,
    'NombreArticulo' => '65',
    'EstructuraCarpeta' => '65',
    'Titulo' => '65',
  ),
  3 => 
  array (
    'Id' => 4,
    'NombreArticulo' => '66',
    'EstructuraCarpeta' => '66',
    'Titulo' => '66',
  ),
  4 => 
  array (
    'Id' => 5,
    'NombreArticulo' => '61',
    'EstructuraCarpeta' => '61',
    'Titulo' => '61',
  ),
);

            $insertadosArticulos = 0;
            foreach ($articulos as $art) {
                $existe = DB::table('articulos')
                    ->where('Id', $art['Id'])
                    ->orWhere('NombreArticulo', $art['NombreArticulo'])
                    ->exists();

                if (! $existe) {
                    DB::table('articulos')->insert($art);
                    $insertadosArticulos++;
                }
            }

            $fraccions = array (
  0 => 
  array (
    'Id' => 1,
    'Nombre' => 'I',
    'EstructuraCarpeta' => 'I',
    'IdArticulo' => 1,
    'Descripcion' => 'El marco normativo aplicable al sujeto obligado, en el que deberá incluirse leyes, códigos, reglamentos, decretos de creación, manuales administrativos, reglas de operación, criterios, políticas, entre otros.',
    'Titulo' => ' Marco Normativo',
    'Consecutivo' => 1,
  ),
  1 => 
  array (
    'Id' => 2,
    'Nombre' => 'II',
    'EstructuraCarpeta' => 'II',
    'IdArticulo' => 1,
    'Descripcion' => 'Su estructura orgánica completa, en un formato que permita vincular cada parte de la estructura, las atribuciones y responsabilidades que le corresponden a cada servidor p?blico, prestador de servicios profesionales o miembro de los sujetos obligados, de conformidad con las disposiciones aplicables.',
    'Titulo' => 'Estructura Orgánica',
    'Consecutivo' => 2,
  ),
  2 => 
  array (
    'Id' => 3,
    'Nombre' => 'III',
    'EstructuraCarpeta' => 'III',
    'IdArticulo' => 1,
    'Descripcion' => 'Las facultades de cada área.',
    'Titulo' => 'Facultades de Cada área',
    'Consecutivo' => 3,
  ),
  3 => 
  array (
    'Id' => 4,
    'Nombre' => 'IV',
    'EstructuraCarpeta' => 'IV',
    'IdArticulo' => 1,
    'Descripcion' => 'Las metas y objetivos de las áreas de conformidad con sus programas operativos.',
    'Titulo' => ' Las Metas y Objetivos de Las áreas',
    'Consecutivo' => 4,
  ),
  4 => 
  array (
    'Id' => 5,
    'Nombre' => 'V',
    'EstructuraCarpeta' => 'V',
    'IdArticulo' => 1,
    'Descripcion' => 'Los indicadores relacionados con temas de interés público o trascendencia social que conforme a sus funciones, deban establecer',
    'Titulo' => 'Indicadores de Temas de Interes Público',
    'Consecutivo' => 5,
  ),
  5 => 
  array (
    'Id' => 6,
    'Nombre' => 'VI',
    'EstructuraCarpeta' => 'VI',
    'IdArticulo' => 1,
    'Descripcion' => 'Los indicadores que permitan rendir cuenta de sus objetivos y resultados',
    'Titulo' => 'Indicadores Objetivos y Resultados',
    'Consecutivo' => 6,
  ),
  6 => 
  array (
    'Id' => 7,
    'Nombre' => 'VII',
    'EstructuraCarpeta' => 'VII',
    'IdArticulo' => 1,
    'Descripcion' => 'El directorio de todos los servidores públicos, a partir del nivel de jefe de departamento o su equivalente, o de menor nivel, cuando se brinde atención al público, manejen o apliquen recursos públicos, realicen actos de autoridad o presten servicios profesionales bajo el régimen de confianza u honorarios y personal de base. el directorio deberá incluir, al menos el nombre, cargo o nombramiento asignado, nivel del puesto en la estructura orgánica, fecha de alta en el cargo, número telefónico, domicilio para recibir correspondencia y dirección de correo electrónico oficiales',
    'Titulo' => 'Directorio de Servidores Públicos',
    'Consecutivo' => 7,
  ),
  7 => 
  array (
    'Id' => 8,
    'Nombre' => 'VIII',
    'EstructuraCarpeta' => 'VIII',
    'IdArticulo' => 1,
    'Descripcion' => 'La remuneración bruta y neta de todos los servidores públicos de base o de confianza, con todas las percepciones, incluyendo sueldos, prestaciones, gratificaciones, primas, comisiones, dietas, bonos, estímulos, ingresos y sistemas de compensación, señalando la periodicidad de dicha remuneración.',
    'Titulo' => 'Remuneración de los servidores públicos',
    'Consecutivo' => 8,
  ),
  8 => 
  array (
    'Id' => 9,
    'Nombre' => 'IX',
    'EstructuraCarpeta' => 'IX',
    'IdArticulo' => 1,
    'Descripcion' => 'Los gastos de representación y viáticos, así como el objeto e informe de comisión correspondiente',
    'Titulo' => 'Gastos de representación y viáticos',
    'Consecutivo' => 9,
  ),
  9 => 
  array (
    'Id' => 10,
    'Nombre' => 'X',
    'EstructuraCarpeta' => 'X',
    'IdArticulo' => 1,
    'Descripcion' => 'El número total de las plazas y del personal de base y confianza, especificando el total de las vacantes, por nivel de puesto, para cada unidad administrativa',
    'Titulo' => 'Número total de plazas',
    'Consecutivo' => 10,
  ),
  10 => 
  array (
    'Id' => 11,
    'Nombre' => 'XI',
    'EstructuraCarpeta' => 'XI',
    'IdArticulo' => 1,
    'Descripcion' => 'Las contrataciones de servicios profesionales por honorarios, señalando los nombres de los prestadores de servicios, los servicios contratados, el monto de los honorarios y el periodo de contratación',
    'Titulo' => 'Contrataciones por Honorarios',
    'Consecutivo' => 11,
  ),
  11 => 
  array (
    'Id' => 12,
    'Nombre' => 'XII',
    'EstructuraCarpeta' => 'XII',
    'IdArticulo' => 1,
    'Descripcion' => 'La información en versión pública de las declaraciones patrimoniales de los servidores públicos que así lo determinen, en los sistemas habilitados para ello, de acuerdo a la normatividad aplicable.',
    'Titulo' => 'Declaraciones Patrimoniales',
    'Consecutivo' => 12,
  ),
  12 => 
  array (
    'Id' => 13,
    'Nombre' => 'XIII',
    'EstructuraCarpeta' => 'XIII',
    'IdArticulo' => 1,
    'Descripcion' => 'El domicilio de la unidad de transparencia, además de la dirección electrónica donde podrán recibirse las solicitudes para obtener la información',
    'Titulo' => 'Domicilio Unidad de Transparencia',
    'Consecutivo' => 13,
  ),
  13 => 
  array (
    'Id' => 14,
    'Nombre' => 'XIV',
    'EstructuraCarpeta' => 'XIV',
    'IdArticulo' => 1,
    'Descripcion' => 'Las convocatorias a concursos para ocupar cargos públicos y los resultados de los mismos',
    'Titulo' => 'Convocatorias para Ocupar Cargos Públicos',
    'Consecutivo' => 14,
  ),
  14 => 
  array (
    'Id' => 15,
    'Nombre' => 'XV',
    'EstructuraCarpeta' => 'XV',
    'IdArticulo' => 1,
    'Descripcion' => 'La información de los programas de subsidios, estímulos y apoyos, en el que se deberá informar respecto de los programas de transferencia, de servicios, de infraestructura social y de subsidio, en los que se deberá contener lo siguiente',
    'Titulo' => 'Programas de Subsidio',
    'Consecutivo' => 15,
  ),
  15 => 
  array (
    'Id' => 16,
    'Nombre' => 'XVI',
    'EstructuraCarpeta' => 'XVI',
    'IdArticulo' => 1,
    'Descripcion' => 'Las condiciones generales de trabajo, contratos o convenios que regulen las relaciones laborales del personal de base o de confianza, así como los recursos públicos económicos, en especie o donativos, que sean entregados a los sindicatos y ejerzan como recursos públicos',
    'Titulo' => 'Condiciones Generales de Trabajo',
    'Consecutivo' => 16,
  ),
  16 => 
  array (
    'Id' => 17,
    'Nombre' => 'XVII',
    'EstructuraCarpeta' => 'XVII',
    'IdArticulo' => 1,
    'Descripcion' => 'La información curricular, desde el nivel de jefe de departamento o equivalente, hasta el titular del sujeto obligado, así como, en su caso, las sanciones administrativas de que haya sido objeto',
    'Titulo' => 'Información Curricular y Sanciones',
    'Consecutivo' => 17,
  ),
  17 => 
  array (
    'Id' => 18,
    'Nombre' => 'XVIII',
    'EstructuraCarpeta' => 'XVIII',
    'IdArticulo' => 1,
    'Descripcion' => 'Listado de Servidores Públicos con Sanciones',
    'Titulo' => 'Listado de Servidores Públicos con Sanciones',
    'Consecutivo' => 18,
  ),
  18 => 
  array (
    'Id' => 19,
    'Nombre' => 'XIX',
    'EstructuraCarpeta' => 'XIX',
    'IdArticulo' => 1,
    'Descripcion' => 'Los servicios que ofrecen señalando los requisitos para acceder a ellos',
    'Titulo' => 'Servicios Públicos',
    'Consecutivo' => 19,
  ),
  19 => 
  array (
    'Id' => 20,
    'Nombre' => 'XX',
    'EstructuraCarpeta' => 'XX',
    'IdArticulo' => 1,
    'Descripcion' => 'Los trámites, requisitos y formatos que ofrecen',
    'Titulo' => 'Trámites y Requisitos',
    'Consecutivo' => 20,
  ),
  20 => 
  array (
    'Id' => 21,
    'Nombre' => 'XXI',
    'EstructuraCarpeta' => 'XXI',
    'IdArticulo' => 1,
    'Descripcion' => 'La información financiera sobre el presupuesto asignado, así como los informes del ejercicio trimestral del gasto, en términos de la ley general de contabilidad gubernamental y demás normatividad aplicable; (auto evaluacion)',
    'Titulo' => 'Información Financiera',
    'Consecutivo' => 21,
  ),
  21 => 
  array (
    'Id' => 22,
    'Nombre' => 'XXII',
    'EstructuraCarpeta' => 'XXII',
    'IdArticulo' => 1,
    'Descripcion' => 'La información relativa a la deuda pública, en términos de la normatividad aplicable',
    'Titulo' => 'Deuda Pública',
    'Consecutivo' => 22,
  ),
  22 => 
  array (
    'Id' => 23,
    'Nombre' => 'XXIII',
    'EstructuraCarpeta' => 'XXIII',
    'IdArticulo' => 1,
    'Descripcion' => 'Los montos destinados a gastos relativos a comunicación social y publicidad oficial desglosada por tipo de medio, proveedores, número de contrato y concepto o campaña',
    'Titulo' => 'Gastos de Comunicación Social',
    'Consecutivo' => 23,
  ),
  23 => 
  array (
    'Id' => 24,
    'Nombre' => 'XXIV',
    'EstructuraCarpeta' => 'XXIV',
    'IdArticulo' => 1,
    'Descripcion' => 'Los informes de resultados de las auditorías al ejercicio presupuestal de cada sujeto obligado que se realicen y, en su caso, las aclaraciones que correspondan',
    'Titulo' => 'Resultados de Auditorias',
    'Consecutivo' => 24,
  ),
  24 => 
  array (
    'Id' => 25,
    'Nombre' => 'XXV',
    'EstructuraCarpeta' => 'XXV',
    'IdArticulo' => 1,
    'Descripcion' => 'El resultado de la dictaminación de los estados financieros',
    'Titulo' => 'Dictamen de Estados Financieros',
    'Consecutivo' => 25,
  ),
  25 => 
  array (
    'Id' => 26,
    'Nombre' => 'XXVI',
    'EstructuraCarpeta' => 'XXVI',
    'IdArticulo' => 1,
    'Descripcion' => 'Los montos, criterios, convocatorias y listado de personas físicas o morales a quienes, por cualquier motivo, se les asigne o permita usar recursos públicos o, en los términos de las disposiciones aplicables, realicen actos de autoridad. asimismo, los informes que dichas personas les entreguen sobre el uso y destino de dichos recursos',
    'Titulo' => 'Montos y listados de personas que realizan actos de autoridad.',
    'Consecutivo' => 26,
  ),
  26 => 
  array (
    'Id' => 27,
    'Nombre' => 'XXVII',
    'EstructuraCarpeta' => 'XXVII',
    'IdArticulo' => 1,
    'Descripcion' => 'Las concesiones, contratos, convenios, permisos, licencias o autorizaciones otorgados, especificando los titulares de aquéllos, debiendo publicarse su objeto, nombre o razón social del titular, vigencia, tipo, términos, condiciones, monto y modificaciones, así como si el procedimiento involucra el aprovechamiento de bienes, servicios y/o recursos públicos.',
    'Titulo' => 'Concesiones, Permisos y Licencias',
    'Consecutivo' => 27,
  ),
  27 => 
  array (
    'Id' => 28,
    'Nombre' => 'XXVIII',
    'EstructuraCarpeta' => 'XXVIII',
    'IdArticulo' => 1,
    'Descripcion' => 'La información sobre los resultados sobre procedimientos de adjudicación directa, invitación restringida y licitación de cualquier naturaleza, incluyendo la versión pública del expediente respectivo y de los contratos celebrados, que deberá contener, por lo menos, lo siguiente.',
    'Titulo' => 'Resultados de Adjudicación y Licitaciones',
    'Consecutivo' => 28,
  ),
  28 => 
  array (
    'Id' => 29,
    'Nombre' => 'XXIX',
    'EstructuraCarpeta' => 'XXIX',
    'IdArticulo' => 1,
    'Descripcion' => 'Los informes que por disposición legal generen los sujetos obligados',
    'Titulo' => 'Informes de Gobierno',
    'Consecutivo' => 29,
  ),
  29 => 
  array (
    'Id' => 30,
    'Nombre' => 'XXX',
    'EstructuraCarpeta' => 'XXX',
    'IdArticulo' => 1,
    'Descripcion' => 'Las estadísticas que generen en cumplimiento de sus facultades, competencias o funciones con la mayor desagregación posible',
    'Titulo' => 'Estadísticas',
    'Consecutivo' => 30,
  ),
  30 => 
  array (
    'Id' => 31,
    'Nombre' => 'XXXI',
    'EstructuraCarpeta' => 'XXXI',
    'IdArticulo' => 1,
    'Descripcion' => 'Informe de avances programáticos o presupuestales, balances generales y su estado financiero',
    'Titulo' => 'Informes de Avances Programáticos',
    'Consecutivo' => 31,
  ),
  31 => 
  array (
    'Id' => 32,
    'Nombre' => 'XXXII',
    'EstructuraCarpeta' => 'XXXII',
    'IdArticulo' => 1,
    'Descripcion' => 'Padrón de proveedores y contratistas',
    'Titulo' => 'Padron de Proveedores y Contratistas',
    'Consecutivo' => 32,
  ),
  32 => 
  array (
    'Id' => 33,
    'Nombre' => 'XXXIII',
    'EstructuraCarpeta' => 'XXXIII',
    'IdArticulo' => 1,
    'Descripcion' => 'Los convenios de coordinación de concertación con los sectores social y privado',
    'Titulo' => 'Convenios de Coordinación',
    'Consecutivo' => 33,
  ),
  33 => 
  array (
    'Id' => 34,
    'Nombre' => 'XXXIV',
    'EstructuraCarpeta' => 'XXXIV',
    'IdArticulo' => 1,
    'Descripcion' => 'El inventario de bienes muebles e inmuebles en posesión y propiedad.',
    'Titulo' => 'Inventario',
    'Consecutivo' => 34,
  ),
  34 => 
  array (
    'Id' => 35,
    'Nombre' => 'XXXV',
    'EstructuraCarpeta' => 'XXXV',
    'IdArticulo' => 1,
    'Descripcion' => 'Las recomendaciones emitidas por los órganos públicos del estado mexicano u organismos internacionales garantes de los derechos humanos, así como las acciones que han llevado a cabo para su atención',
    'Titulo' => 'Recomendaciones de los Derechos Humanos',
    'Consecutivo' => 35,
  ),
  35 => 
  array (
    'Id' => 36,
    'Nombre' => 'XXXVI',
    'EstructuraCarpeta' => 'XXXVI',
    'IdArticulo' => 1,
    'Descripcion' => 'Las resoluciones y laudos que se emitan en procesos o procedimientos seguidos en forma de juicio',
    'Titulo' => 'Resoluciones y Laudos',
    'Consecutivo' => 36,
  ),
  36 => 
  array (
    'Id' => 37,
    'Nombre' => 'XXXVII',
    'EstructuraCarpeta' => 'XXXVII',
    'IdArticulo' => 1,
    'Descripcion' => 'Los mecanismos de participación ciudadana',
    'Titulo' => 'Mecanismos de Participación Ciudadana',
    'Consecutivo' => 37,
  ),
  37 => 
  array (
    'Id' => 38,
    'Nombre' => 'XXXVIII',
    'EstructuraCarpeta' => 'XXXVIII',
    'IdArticulo' => 1,
    'Descripcion' => 'Los programas que ofrecen, incluyendo información sobre la población, objetivo y destino, así como los trámites, tiempos de respuesta, requisitos y formatos para acceder a los mismos',
    'Titulo' => 'Programas que se ofrecen',
    'Consecutivo' => 38,
  ),
  38 => 
  array (
    'Id' => 39,
    'Nombre' => 'XXXIX',
    'EstructuraCarpeta' => 'XXXIX',
    'IdArticulo' => 1,
    'Descripcion' => 'Las actas y resoluciones del comité de transparencia de los sujetos obligados',
    'Titulo' => 'Actas del Comité de Transparencia',
    'Consecutivo' => 39,
  ),
  39 => 
  array (
    'Id' => 40,
    'Nombre' => 'XL',
    'EstructuraCarpeta' => 'XL',
    'IdArticulo' => 1,
    'Descripcion' => 'Todas las evaluaciones y encuestas que hagan los sujetos obligados a programas financiados con recursos públicos',
    'Titulo' => 'Evaluaciones y Encuestas',
    'Consecutivo' => 40,
  ),
  40 => 
  array (
    'Id' => 41,
    'Nombre' => 'XLI',
    'EstructuraCarpeta' => 'XLI',
    'IdArticulo' => 1,
    'Descripcion' => 'Los estudios financiados con recursos públicos',
    'Titulo' => 'Estudios Financiados',
    'Consecutivo' => 41,
  ),
  41 => 
  array (
    'Id' => 42,
    'Nombre' => 'XLII',
    'EstructuraCarpeta' => 'XLII',
    'IdArticulo' => 1,
    'Descripcion' => 'El listado de jubilados y pensionados y el monto que reciben',
    'Titulo' => 'Listados de Jubilados y Pensionados',
    'Consecutivo' => 42,
  ),
  42 => 
  array (
    'Id' => 43,
    'Nombre' => 'XLIII',
    'EstructuraCarpeta' => 'XLIII',
    'IdArticulo' => 1,
    'Descripcion' => 'Los ingresos recibidos por cualquier concepto, señalando el nombre de los responsables de recibirlos, administrarlos y ejercerlos, así como su destino; indicando el destino de cada uno de ellos',
    'Titulo' => 'Ingresos',
    'Consecutivo' => 43,
  ),
  43 => 
  array (
    'Id' => 44,
    'Nombre' => 'XLIV',
    'EstructuraCarpeta' => 'XLIV',
    'IdArticulo' => 1,
    'Descripcion' => 'Donaciones hechas a terceros en dinero o en especie',
    'Titulo' => 'Donaciones',
    'Consecutivo' => 44,
  ),
  44 => 
  array (
    'Id' => 45,
    'Nombre' => 'XLV',
    'EstructuraCarpeta' => 'XLV',
    'IdArticulo' => 1,
    'Descripcion' => 'El catálogo de disposición y guía de archivo documental ',
    'Titulo' => 'Guía de Archivo Documental',
    'Consecutivo' => 45,
  ),
  45 => 
  array (
    'Id' => 46,
    'Nombre' => 'XLVI',
    'EstructuraCarpeta' => 'XLVI',
    'IdArticulo' => 1,
    'Descripcion' => 'Las actas de sesiones ordinarias y extraordinarias, así como las opiniones y recomendaciones que emitan, en su caso, los consejos consultivos',
    'Titulo' => 'Las Actas de los Consejos Consultivos',
    'Consecutivo' => 46,
  ),
  46 => 
  array (
    'Id' => 47,
    'Nombre' => 'XLVII',
    'EstructuraCarpeta' => 'XLVII',
    'IdArticulo' => 1,
    'Descripcion' => 'Para efectos estadísticos, el listado de solicitudes a las empresas concesionarias de telecomunicaciones y proveedores de servicios o aplicaciones de internet para la intervención de comunicaciones privadas, el acceso al registro de comunicaciones y la localización geográfica en tiempo real de equipos de comunicación, que contenga exclusivamente el objeto, el alcance temporal y los fundamentos legales del requerimiento, así como, en su caso, la mención que cuenta con la autorización judicial correspondiente',
    'Titulo' => 'Listado de Solicitudes de Comunicaciones Privadas',
    'Consecutivo' => 47,
  ),
  47 => 
  array (
    'Id' => 48,
    'Nombre' => 'XLVIII',
    'EstructuraCarpeta' => 'XLVIII',
    'IdArticulo' => 1,
    'Descripcion' => 'Los acuerdos e índices de la información clasificada como reservada, en formatos abiertos',
    'Titulo' => 'Indice Información Reservada',
    'Consecutivo' => 48,
  ),
  48 => 
  array (
    'Id' => 49,
    'Nombre' => 'XLIX',
    'EstructuraCarpeta' => 'XLIX',
    'IdArticulo' => 1,
    'Descripcion' => 'Cualquier otra información que sea de utilidad o se considere relevante, además de la que, con base en la información estadística, responda a las preguntas hechas con más frecuencia por el público.',
    'Titulo' => 'Información relevante',
    'Consecutivo' => 49,
  ),
  49 => 
  array (
    'Id' => 51,
    'Nombre' => 'II',
    'EstructuraCarpeta' => 'II',
    'IdArticulo' => 2,
    'Descripcion' => 'Los reglamentos o disposiciones de carácter general o particular en materia municipal',
    'Titulo' => 'Reglamentos Municipales',
    'Consecutivo' => 2,
  ),
  50 => 
  array (
    'Id' => 52,
    'Nombre' => 'III',
    'EstructuraCarpeta' => 'III',
    'IdArticulo' => 2,
    'Descripcion' => 'Los datos referentes al servicio público de agua potable, drenaje, alcantarillado, tratamiento y disposición de aguas residuales, alumbrado público; los programas de limpia, recolección, traslado y tratamiento y disposición final de residuos; mercados y centrales de abasto, panteones, rastros, calles, parques, jardines y su equipamiento',
    'Titulo' => 'Datos Servicios Públicos Municipales',
    'Consecutivo' => 3,
  ),
  51 => 
  array (
    'Id' => 53,
    'Nombre' => 'IV',
    'EstructuraCarpeta' => 'IV',
    'IdArticulo' => 2,
    'Descripcion' => 'La creación y administración de sus reservas acuíferas, territoriales y ecológicas',
    'Titulo' => 'La Creación y Administración de sus reservas acuíferas, Territoriales y Ecológicas.',
    'Consecutivo' => 4,
  ),
  52 => 
  array (
    'Id' => 54,
    'Nombre' => 'V',
    'EstructuraCarpeta' => 'V',
    'IdArticulo' => 2,
    'Descripcion' => 'La formulación, aprobación y administración de la zonificación y planes de desarrollo municipal',
    'Titulo' => 'Formulación, aprobación y administración de la zonificación y planes de desarrollo municipal',
    'Consecutivo' => 5,
  ),
  53 => 
  array (
    'Id' => 55,
    'Nombre' => 'VI',
    'EstructuraCarpeta' => 'VI',
    'IdArticulo' => 2,
    'Descripcion' => 'La información detallada que contengan los planes de desarrollo urbano, ordenamiento territorial y ecológico, los tipos y usos desuelo, licencias de uso y construcción otorgadas por los gobiernos municipales',
    'Titulo' => 'Uso de suelo',
    'Consecutivo' => 6,
  ),
  54 => 
  array (
    'Id' => 56,
    'Nombre' => 'VII',
    'EstructuraCarpeta' => 'VII',
    'IdArticulo' => 2,
    'Descripcion' => 'Participaciones Federales',
    'Titulo' => 'Participaciones Federales',
    'Consecutivo' => 7,
  ),
  55 => 
  array (
    'Id' => 57,
    'Nombre' => 'VIII',
    'EstructuraCarpeta' => 'VIII',
    'IdArticulo' => 2,
    'Descripcion' => 'El catálogo de localidades y la metodología empleada para su conformación',
    'Titulo' => 'Catálogo de Localidades y Metología Empleada',
    'Consecutivo' => 8,
  ),
  56 => 
  array (
    'Id' => 58,
    'Nombre' => 'IX',
    'EstructuraCarpeta' => 'IX',
    'IdArticulo' => 2,
    'Descripcion' => 'Las cuotas y tarifas aplicables, impuestos, derechos, contribuciones de me1jora así como las tablas de valores unitarios de suelos y construccio es que sirvan de base para el cobro de las contribuciones sobre la propiedad inmobiliaria',
    'Titulo' => 'Cúotas, Tarifas, Impuestos, Derechos, Tablas de Valores Unitarios de Suelos y Construcciones',
    'Consecutivo' => 9,
  ),
  57 => 
  array (
    'Id' => 59,
    'Nombre' => 'X',
    'EstructuraCarpeta' => 'X',
    'IdArticulo' => 2,
    'Descripcion' => 'El presupuesto de egresos y las fórmulas dé distribucion de los recursos otorgados',
    'Titulo' => 'Presupuesto de Egresos',
    'Consecutivo' => 10,
  ),
  58 => 
  array (
    'Id' => 60,
    'Nombre' => 'XI',
    'EstructuraCarpeta' => 'XI',
    'IdArticulo' => 2,
    'Descripcion' => 'El nombre, denominación o razón social y clave del registro federal de contribuyentes a los que se les hubiera cancelado o condonado algún crédito fiscal, así como los montos respectivos. también, la información estadística sobre las exenciones previstas en las disposiciones fiscales',
    'Titulo' => 'Cancelación de Créditos fiscales',
    'Consecutivo' => 11,
  ),
  59 => 
  array (
    'Id' => 61,
    'Nombre' => 'XII',
    'EstructuraCarpeta' => 'XII',
    'IdArticulo' => 2,
    'Descripcion' => 'Las disposiciones administrativas, directamente o a través de la autoridad competente, con el plazo dé anticipación que prevean las normas aplicables al sujeto obligado de que se trate, salvo que su difusión pueda comprometer los efectos que se pretenden lograr con la medida o se trate de situaciones de emergencia, de conformidad con dichas disposiciones',
    'Titulo' => 'Disposiciones Administrativas',
    'Consecutivo' => 12,
  ),
  60 => 
  array (
    'Id' => 62,
    'Nombre' => 'XIII',
    'EstructuraCarpeta' => 'XIII',
    'IdArticulo' => 2,
    'Descripcion' => 'El contenido de las gacetas municipales o cualquier otro documentó por el cual se dé aviso a los ciudadanos; los cuales deberán comprender los resolutivos y acuerdos aprobados por los ayuntamientos',
    'Titulo' => ' Gacetas Municipales',
    'Consecutivo' => 13,
  ),
  61 => 
  array (
    'Id' => 63,
    'Nombre' => 'XIV',
    'EstructuraCarpeta' => 'XIV',
    'IdArticulo' => 2,
    'Descripcion' => 'Actas de Cabildo',
    'Titulo' => 'Actas de Cabildo',
    'Consecutivo' => 14,
  ),
  62 => 
  array (
    'Id' => 64,
    'Nombre' => 'I',
    'EstructuraCarpeta' => 'I',
    'IdArticulo' => 2,
    'Descripcion' => 'El plan municipal de desarrollo, los programas operativos anuales sectoriales, desglosado por partida, monto, obra y comunidades y las modificaciones que a los mismos se propongán.',
    'Titulo' => 'Plan Municipal de Desarrollo, los Programas Operativos Anuales Sectoriales',
    'Consecutivo' => 1,
  ),
  63 => 
  array (
    'Id' => 65,
    'Nombre' => 'XVII',
    'EstructuraCarpeta' => 'XVII',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 17,
  ),
  64 => 
  array (
    'Id' => 66,
    'Nombre' => 'XVIII',
    'EstructuraCarpeta' => 'XVIII',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 18,
  ),
  65 => 
  array (
    'Id' => 67,
    'Nombre' => 'VI',
    'EstructuraCarpeta' => 'VI',
    'IdArticulo' => 4,
    'Descripcion' => 'Pendiene',
    'Titulo' => NULL,
    'Consecutivo' => 6,
  ),
  66 => 
  array (
    'Id' => 68,
    'Nombre' => 'XXXV',
    'EstructuraCarpeta' => 'XXXV',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 35,
  ),
  67 => 
  array (
    'Id' => 69,
    'Nombre' => 'XXV',
    'EstructuraCarpeta' => 'XXV',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 25,
  ),
  68 => 
  array (
    'Id' => 70,
    'Nombre' => 'I',
    'EstructuraCarpeta' => 'I',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 1,
  ),
  69 => 
  array (
    'Id' => 71,
    'Nombre' => 'II',
    'EstructuraCarpeta' => 'II',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 2,
  ),
  70 => 
  array (
    'Id' => 72,
    'Nombre' => 'III',
    'EstructuraCarpeta' => 'III',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 3,
  ),
  71 => 
  array (
    'Id' => 73,
    'Nombre' => 'XLVI',
    'EstructuraCarpeta' => 'XLVI',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 46,
  ),
  72 => 
  array (
    'Id' => 74,
    'Nombre' => 'XIV',
    'EstructuraCarpeta' => 'XIV',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 14,
  ),
  73 => 
  array (
    'Id' => 76,
    'Nombre' => 'IX',
    'EstructuraCarpeta' => 'IX',
    'IdArticulo' => 4,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 9,
  ),
  74 => 
  array (
    'Id' => 77,
    'Nombre' => 'XX',
    'EstructuraCarpeta' => 'XX',
    'IdArticulo' => 3,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 20,
  ),
  75 => 
  array (
    'Id' => 78,
    'Nombre' => 'IV',
    'EstructuraCarpeta' => 'IV',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 4,
  ),
  76 => 
  array (
    'Id' => 79,
    'Nombre' => 'V',
    'EstructuraCarpeta' => 'V',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 5,
  ),
  77 => 
  array (
    'Id' => 80,
    'Nombre' => 'VI',
    'EstructuraCarpeta' => 'VI',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 6,
  ),
  78 => 
  array (
    'Id' => 81,
    'Nombre' => 'VII',
    'EstructuraCarpeta' => 'VII',
    'IdArticulo' => 5,
    'Descripcion' => 'Pendiente',
    'Titulo' => NULL,
    'Consecutivo' => 7,
  ),
  79 => 
  array (
    'Id' => 82,
    'Nombre' => 'VIII',
    'EstructuraCarpeta' => 'VIII',
    'IdArticulo' => 5,
    'Descripcion' => 'PEndiente',
    'Titulo' => NULL,
    'Consecutivo' => 8,
  ),
);

            $insertadosFracciones = 0;
            foreach ($fraccions as $frac) {
                $existe = DB::table('fraccions')
                    ->where('Id', $frac['Id'])
                    ->orWhere(function ($q) use ($frac) {
                        $q->where('IdArticulo', $frac['IdArticulo'])
                          ->where(function ($sub) use ($frac) {
                              $sub->where('Consecutivo', $frac['Consecutivo'])
                                  ->orWhere('Nombre', $frac['Nombre']);
                          });
                    })
                    ->exists();

                if (! $existe) {
                    DB::table('fraccions')->insert($frac);
                    $insertadosFracciones++;
                }
            }

            $this->command->info("Catálogo sincronizado: {$insertadosArticulos} artículos nuevos y {$insertadosFracciones} fracciones nuevas insertadas.");
        });
    }
}