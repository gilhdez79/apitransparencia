-- =============================================================================
-- SCRIPT DE ACTUALIZACIÓN / SINCRONIZACIÓN DE CATÁLOGOS EN PRODUCCIÓN
-- Tablas: articulos, fraccions
-- Entorno: Producción (dbarchivostransparencia)
-- Regla: Verificación previa de existencia (Si el elemento ya existe, NO insertar)
-- Idempotente y seguro para reejecución
-- Generado: 2026-11-20 16:55:29
-- =============================================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

START TRANSACTION;

-- -----------------------------------------------------------------------------
-- 1. CATÁLOGO DE ARTÍCULOS (5 registros)
-- -----------------------------------------------------------------------------
-- Artículo ID 1: 76
INSERT INTO `articulos` (`Id`, `NombreArticulo`, `EstructuraCarpeta`, `Titulo`)
SELECT 1, '76', '76', '76'
WHERE NOT EXISTS (
    SELECT 1 FROM `articulos` WHERE `Id` = 1 OR `NombreArticulo` = '76'
);

-- Artículo ID 2: 78
INSERT INTO `articulos` (`Id`, `NombreArticulo`, `EstructuraCarpeta`, `Titulo`)
SELECT 2, '78', '78', '78'
WHERE NOT EXISTS (
    SELECT 1 FROM `articulos` WHERE `Id` = 2 OR `NombreArticulo` = '78'
);

-- Artículo ID 3: 65
INSERT INTO `articulos` (`Id`, `NombreArticulo`, `EstructuraCarpeta`, `Titulo`)
SELECT 3, '65', '65', '65'
WHERE NOT EXISTS (
    SELECT 1 FROM `articulos` WHERE `Id` = 3 OR `NombreArticulo` = '65'
);

-- Artículo ID 4: 66
INSERT INTO `articulos` (`Id`, `NombreArticulo`, `EstructuraCarpeta`, `Titulo`)
SELECT 4, '66', '66', '66'
WHERE NOT EXISTS (
    SELECT 1 FROM `articulos` WHERE `Id` = 4 OR `NombreArticulo` = '66'
);

-- Artículo ID 5: 61
INSERT INTO `articulos` (`Id`, `NombreArticulo`, `EstructuraCarpeta`, `Titulo`)
SELECT 5, '61', '61', '61'
WHERE NOT EXISTS (
    SELECT 1 FROM `articulos` WHERE `Id` = 5 OR `NombreArticulo` = '61'
);

-- -----------------------------------------------------------------------------
-- 2. CATÁLOGO DE FRACCIONES (80 registros)
-- -----------------------------------------------------------------------------
-- Fracción ID 1 (Artículo 1, Fracción 'I', Consecutivo 1)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 1, 'I', 'I', 1, 'El marco normativo aplicable al sujeto obligado, en el que deberá incluirse leyes, códigos, reglamentos, decretos de creación, manuales administrativos, reglas de operación, criterios, políticas, entre otros.', ' Marco Normativo', 1
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 1 OR (`IdArticulo` = 1 AND (`Consecutivo` = 1 OR `Nombre` = 'I'))
);

-- Fracción ID 2 (Artículo 1, Fracción 'II', Consecutivo 2)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 2, 'II', 'II', 1, 'Su estructura orgánica completa, en un formato que permita vincular cada parte de la estructura, las atribuciones y responsabilidades que le corresponden a cada servidor p?blico, prestador de servicios profesionales o miembro de los sujetos obligados, de conformidad con las disposiciones aplicables.', 'Estructura Orgánica', 2
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 2 OR (`IdArticulo` = 1 AND (`Consecutivo` = 2 OR `Nombre` = 'II'))
);

-- Fracción ID 3 (Artículo 1, Fracción 'III', Consecutivo 3)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 3, 'III', 'III', 1, 'Las facultades de cada área.', 'Facultades de Cada área', 3
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 3 OR (`IdArticulo` = 1 AND (`Consecutivo` = 3 OR `Nombre` = 'III'))
);

-- Fracción ID 4 (Artículo 1, Fracción 'IV', Consecutivo 4)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 4, 'IV', 'IV', 1, 'Las metas y objetivos de las áreas de conformidad con sus programas operativos.', ' Las Metas y Objetivos de Las áreas', 4
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 4 OR (`IdArticulo` = 1 AND (`Consecutivo` = 4 OR `Nombre` = 'IV'))
);

-- Fracción ID 5 (Artículo 1, Fracción 'V', Consecutivo 5)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 5, 'V', 'V', 1, 'Los indicadores relacionados con temas de interés público o trascendencia social que conforme a sus funciones, deban establecer', 'Indicadores de Temas de Interes Público', 5
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 5 OR (`IdArticulo` = 1 AND (`Consecutivo` = 5 OR `Nombre` = 'V'))
);

-- Fracción ID 6 (Artículo 1, Fracción 'VI', Consecutivo 6)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 6, 'VI', 'VI', 1, 'Los indicadores que permitan rendir cuenta de sus objetivos y resultados', 'Indicadores Objetivos y Resultados', 6
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 6 OR (`IdArticulo` = 1 AND (`Consecutivo` = 6 OR `Nombre` = 'VI'))
);

-- Fracción ID 7 (Artículo 1, Fracción 'VII', Consecutivo 7)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 7, 'VII', 'VII', 1, 'El directorio de todos los servidores públicos, a partir del nivel de jefe de departamento o su equivalente, o de menor nivel, cuando se brinde atención al público, manejen o apliquen recursos públicos, realicen actos de autoridad o presten servicios profesionales bajo el régimen de confianza u honorarios y personal de base. el directorio deberá incluir, al menos el nombre, cargo o nombramiento asignado, nivel del puesto en la estructura orgánica, fecha de alta en el cargo, número telefónico, domicilio para recibir correspondencia y dirección de correo electrónico oficiales', 'Directorio de Servidores Públicos', 7
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 7 OR (`IdArticulo` = 1 AND (`Consecutivo` = 7 OR `Nombre` = 'VII'))
);

-- Fracción ID 8 (Artículo 1, Fracción 'VIII', Consecutivo 8)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 8, 'VIII', 'VIII', 1, 'La remuneración bruta y neta de todos los servidores públicos de base o de confianza, con todas las percepciones, incluyendo sueldos, prestaciones, gratificaciones, primas, comisiones, dietas, bonos, estímulos, ingresos y sistemas de compensación, señalando la periodicidad de dicha remuneración.', 'Remuneración de los servidores públicos', 8
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 8 OR (`IdArticulo` = 1 AND (`Consecutivo` = 8 OR `Nombre` = 'VIII'))
);

-- Fracción ID 9 (Artículo 1, Fracción 'IX', Consecutivo 9)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 9, 'IX', 'IX', 1, 'Los gastos de representación y viáticos, así como el objeto e informe de comisión correspondiente', 'Gastos de representación y viáticos', 9
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 9 OR (`IdArticulo` = 1 AND (`Consecutivo` = 9 OR `Nombre` = 'IX'))
);

-- Fracción ID 10 (Artículo 1, Fracción 'X', Consecutivo 10)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 10, 'X', 'X', 1, 'El número total de las plazas y del personal de base y confianza, especificando el total de las vacantes, por nivel de puesto, para cada unidad administrativa', 'Número total de plazas', 10
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 10 OR (`IdArticulo` = 1 AND (`Consecutivo` = 10 OR `Nombre` = 'X'))
);

-- Fracción ID 11 (Artículo 1, Fracción 'XI', Consecutivo 11)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 11, 'XI', 'XI', 1, 'Las contrataciones de servicios profesionales por honorarios, señalando los nombres de los prestadores de servicios, los servicios contratados, el monto de los honorarios y el periodo de contratación', 'Contrataciones por Honorarios', 11
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 11 OR (`IdArticulo` = 1 AND (`Consecutivo` = 11 OR `Nombre` = 'XI'))
);

-- Fracción ID 12 (Artículo 1, Fracción 'XII', Consecutivo 12)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 12, 'XII', 'XII', 1, 'La información en versión pública de las declaraciones patrimoniales de los servidores públicos que así lo determinen, en los sistemas habilitados para ello, de acuerdo a la normatividad aplicable.', 'Declaraciones Patrimoniales', 12
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 12 OR (`IdArticulo` = 1 AND (`Consecutivo` = 12 OR `Nombre` = 'XII'))
);

-- Fracción ID 13 (Artículo 1, Fracción 'XIII', Consecutivo 13)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 13, 'XIII', 'XIII', 1, 'El domicilio de la unidad de transparencia, además de la dirección electrónica donde podrán recibirse las solicitudes para obtener la información', 'Domicilio Unidad de Transparencia', 13
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 13 OR (`IdArticulo` = 1 AND (`Consecutivo` = 13 OR `Nombre` = 'XIII'))
);

-- Fracción ID 14 (Artículo 1, Fracción 'XIV', Consecutivo 14)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 14, 'XIV', 'XIV', 1, 'Las convocatorias a concursos para ocupar cargos públicos y los resultados de los mismos', 'Convocatorias para Ocupar Cargos Públicos', 14
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 14 OR (`IdArticulo` = 1 AND (`Consecutivo` = 14 OR `Nombre` = 'XIV'))
);

-- Fracción ID 15 (Artículo 1, Fracción 'XV', Consecutivo 15)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 15, 'XV', 'XV', 1, 'La información de los programas de subsidios, estímulos y apoyos, en el que se deberá informar respecto de los programas de transferencia, de servicios, de infraestructura social y de subsidio, en los que se deberá contener lo siguiente', 'Programas de Subsidio', 15
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 15 OR (`IdArticulo` = 1 AND (`Consecutivo` = 15 OR `Nombre` = 'XV'))
);

-- Fracción ID 16 (Artículo 1, Fracción 'XVI', Consecutivo 16)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 16, 'XVI', 'XVI', 1, 'Las condiciones generales de trabajo, contratos o convenios que regulen las relaciones laborales del personal de base o de confianza, así como los recursos públicos económicos, en especie o donativos, que sean entregados a los sindicatos y ejerzan como recursos públicos', 'Condiciones Generales de Trabajo', 16
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 16 OR (`IdArticulo` = 1 AND (`Consecutivo` = 16 OR `Nombre` = 'XVI'))
);

-- Fracción ID 17 (Artículo 1, Fracción 'XVII', Consecutivo 17)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 17, 'XVII', 'XVII', 1, 'La información curricular, desde el nivel de jefe de departamento o equivalente, hasta el titular del sujeto obligado, así como, en su caso, las sanciones administrativas de que haya sido objeto', 'Información Curricular y Sanciones', 17
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 17 OR (`IdArticulo` = 1 AND (`Consecutivo` = 17 OR `Nombre` = 'XVII'))
);

-- Fracción ID 18 (Artículo 1, Fracción 'XVIII', Consecutivo 18)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 18, 'XVIII', 'XVIII', 1, 'Listado de Servidores Públicos con Sanciones', 'Listado de Servidores Públicos con Sanciones', 18
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 18 OR (`IdArticulo` = 1 AND (`Consecutivo` = 18 OR `Nombre` = 'XVIII'))
);

-- Fracción ID 19 (Artículo 1, Fracción 'XIX', Consecutivo 19)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 19, 'XIX', 'XIX', 1, 'Los servicios que ofrecen señalando los requisitos para acceder a ellos', 'Servicios Públicos', 19
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 19 OR (`IdArticulo` = 1 AND (`Consecutivo` = 19 OR `Nombre` = 'XIX'))
);

-- Fracción ID 20 (Artículo 1, Fracción 'XX', Consecutivo 20)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 20, 'XX', 'XX', 1, 'Los trámites, requisitos y formatos que ofrecen', 'Trámites y Requisitos', 20
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 20 OR (`IdArticulo` = 1 AND (`Consecutivo` = 20 OR `Nombre` = 'XX'))
);

-- Fracción ID 21 (Artículo 1, Fracción 'XXI', Consecutivo 21)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 21, 'XXI', 'XXI', 1, 'La información financiera sobre el presupuesto asignado, así como los informes del ejercicio trimestral del gasto, en términos de la ley general de contabilidad gubernamental y demás normatividad aplicable; (auto evaluacion)', 'Información Financiera', 21
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 21 OR (`IdArticulo` = 1 AND (`Consecutivo` = 21 OR `Nombre` = 'XXI'))
);

-- Fracción ID 22 (Artículo 1, Fracción 'XXII', Consecutivo 22)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 22, 'XXII', 'XXII', 1, 'La información relativa a la deuda pública, en términos de la normatividad aplicable', 'Deuda Pública', 22
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 22 OR (`IdArticulo` = 1 AND (`Consecutivo` = 22 OR `Nombre` = 'XXII'))
);

-- Fracción ID 23 (Artículo 1, Fracción 'XXIII', Consecutivo 23)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 23, 'XXIII', 'XXIII', 1, 'Los montos destinados a gastos relativos a comunicación social y publicidad oficial desglosada por tipo de medio, proveedores, número de contrato y concepto o campaña', 'Gastos de Comunicación Social', 23
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 23 OR (`IdArticulo` = 1 AND (`Consecutivo` = 23 OR `Nombre` = 'XXIII'))
);

-- Fracción ID 24 (Artículo 1, Fracción 'XXIV', Consecutivo 24)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 24, 'XXIV', 'XXIV', 1, 'Los informes de resultados de las auditorías al ejercicio presupuestal de cada sujeto obligado que se realicen y, en su caso, las aclaraciones que correspondan', 'Resultados de Auditorias', 24
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 24 OR (`IdArticulo` = 1 AND (`Consecutivo` = 24 OR `Nombre` = 'XXIV'))
);

-- Fracción ID 25 (Artículo 1, Fracción 'XXV', Consecutivo 25)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 25, 'XXV', 'XXV', 1, 'El resultado de la dictaminación de los estados financieros', 'Dictamen de Estados Financieros', 25
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 25 OR (`IdArticulo` = 1 AND (`Consecutivo` = 25 OR `Nombre` = 'XXV'))
);

-- Fracción ID 26 (Artículo 1, Fracción 'XXVI', Consecutivo 26)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 26, 'XXVI', 'XXVI', 1, 'Los montos, criterios, convocatorias y listado de personas físicas o morales a quienes, por cualquier motivo, se les asigne o permita usar recursos públicos o, en los términos de las disposiciones aplicables, realicen actos de autoridad. asimismo, los informes que dichas personas les entreguen sobre el uso y destino de dichos recursos', 'Montos y listados de personas que realizan actos de autoridad.', 26
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 26 OR (`IdArticulo` = 1 AND (`Consecutivo` = 26 OR `Nombre` = 'XXVI'))
);

-- Fracción ID 27 (Artículo 1, Fracción 'XXVII', Consecutivo 27)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 27, 'XXVII', 'XXVII', 1, 'Las concesiones, contratos, convenios, permisos, licencias o autorizaciones otorgados, especificando los titulares de aquéllos, debiendo publicarse su objeto, nombre o razón social del titular, vigencia, tipo, términos, condiciones, monto y modificaciones, así como si el procedimiento involucra el aprovechamiento de bienes, servicios y/o recursos públicos.', 'Concesiones, Permisos y Licencias', 27
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 27 OR (`IdArticulo` = 1 AND (`Consecutivo` = 27 OR `Nombre` = 'XXVII'))
);

-- Fracción ID 28 (Artículo 1, Fracción 'XXVIII', Consecutivo 28)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 28, 'XXVIII', 'XXVIII', 1, 'La información sobre los resultados sobre procedimientos de adjudicación directa, invitación restringida y licitación de cualquier naturaleza, incluyendo la versión pública del expediente respectivo y de los contratos celebrados, que deberá contener, por lo menos, lo siguiente.', 'Resultados de Adjudicación y Licitaciones', 28
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 28 OR (`IdArticulo` = 1 AND (`Consecutivo` = 28 OR `Nombre` = 'XXVIII'))
);

-- Fracción ID 29 (Artículo 1, Fracción 'XXIX', Consecutivo 29)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 29, 'XXIX', 'XXIX', 1, 'Los informes que por disposición legal generen los sujetos obligados', 'Informes de Gobierno', 29
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 29 OR (`IdArticulo` = 1 AND (`Consecutivo` = 29 OR `Nombre` = 'XXIX'))
);

-- Fracción ID 30 (Artículo 1, Fracción 'XXX', Consecutivo 30)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 30, 'XXX', 'XXX', 1, 'Las estadísticas que generen en cumplimiento de sus facultades, competencias o funciones con la mayor desagregación posible', 'Estadísticas', 30
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 30 OR (`IdArticulo` = 1 AND (`Consecutivo` = 30 OR `Nombre` = 'XXX'))
);

-- Fracción ID 31 (Artículo 1, Fracción 'XXXI', Consecutivo 31)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 31, 'XXXI', 'XXXI', 1, 'Informe de avances programáticos o presupuestales, balances generales y su estado financiero', 'Informes de Avances Programáticos', 31
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 31 OR (`IdArticulo` = 1 AND (`Consecutivo` = 31 OR `Nombre` = 'XXXI'))
);

-- Fracción ID 32 (Artículo 1, Fracción 'XXXII', Consecutivo 32)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 32, 'XXXII', 'XXXII', 1, 'Padrón de proveedores y contratistas', 'Padron de Proveedores y Contratistas', 32
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 32 OR (`IdArticulo` = 1 AND (`Consecutivo` = 32 OR `Nombre` = 'XXXII'))
);

-- Fracción ID 33 (Artículo 1, Fracción 'XXXIII', Consecutivo 33)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 33, 'XXXIII', 'XXXIII', 1, 'Los convenios de coordinación de concertación con los sectores social y privado', 'Convenios de Coordinación', 33
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 33 OR (`IdArticulo` = 1 AND (`Consecutivo` = 33 OR `Nombre` = 'XXXIII'))
);

-- Fracción ID 34 (Artículo 1, Fracción 'XXXIV', Consecutivo 34)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 34, 'XXXIV', 'XXXIV', 1, 'El inventario de bienes muebles e inmuebles en posesión y propiedad.', 'Inventario', 34
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 34 OR (`IdArticulo` = 1 AND (`Consecutivo` = 34 OR `Nombre` = 'XXXIV'))
);

-- Fracción ID 35 (Artículo 1, Fracción 'XXXV', Consecutivo 35)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 35, 'XXXV', 'XXXV', 1, 'Las recomendaciones emitidas por los órganos públicos del estado mexicano u organismos internacionales garantes de los derechos humanos, así como las acciones que han llevado a cabo para su atención', 'Recomendaciones de los Derechos Humanos', 35
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 35 OR (`IdArticulo` = 1 AND (`Consecutivo` = 35 OR `Nombre` = 'XXXV'))
);

-- Fracción ID 36 (Artículo 1, Fracción 'XXXVI', Consecutivo 36)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 36, 'XXXVI', 'XXXVI', 1, 'Las resoluciones y laudos que se emitan en procesos o procedimientos seguidos en forma de juicio', 'Resoluciones y Laudos', 36
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 36 OR (`IdArticulo` = 1 AND (`Consecutivo` = 36 OR `Nombre` = 'XXXVI'))
);

-- Fracción ID 37 (Artículo 1, Fracción 'XXXVII', Consecutivo 37)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 37, 'XXXVII', 'XXXVII', 1, 'Los mecanismos de participación ciudadana', 'Mecanismos de Participación Ciudadana', 37
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 37 OR (`IdArticulo` = 1 AND (`Consecutivo` = 37 OR `Nombre` = 'XXXVII'))
);

-- Fracción ID 38 (Artículo 1, Fracción 'XXXVIII', Consecutivo 38)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 38, 'XXXVIII', 'XXXVIII', 1, 'Los programas que ofrecen, incluyendo información sobre la población, objetivo y destino, así como los trámites, tiempos de respuesta, requisitos y formatos para acceder a los mismos', 'Programas que se ofrecen', 38
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 38 OR (`IdArticulo` = 1 AND (`Consecutivo` = 38 OR `Nombre` = 'XXXVIII'))
);

-- Fracción ID 39 (Artículo 1, Fracción 'XXXIX', Consecutivo 39)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 39, 'XXXIX', 'XXXIX', 1, 'Las actas y resoluciones del comité de transparencia de los sujetos obligados', 'Actas del Comité de Transparencia', 39
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 39 OR (`IdArticulo` = 1 AND (`Consecutivo` = 39 OR `Nombre` = 'XXXIX'))
);

-- Fracción ID 40 (Artículo 1, Fracción 'XL', Consecutivo 40)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 40, 'XL', 'XL', 1, 'Todas las evaluaciones y encuestas que hagan los sujetos obligados a programas financiados con recursos públicos', 'Evaluaciones y Encuestas', 40
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 40 OR (`IdArticulo` = 1 AND (`Consecutivo` = 40 OR `Nombre` = 'XL'))
);

-- Fracción ID 41 (Artículo 1, Fracción 'XLI', Consecutivo 41)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 41, 'XLI', 'XLI', 1, 'Los estudios financiados con recursos públicos', 'Estudios Financiados', 41
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 41 OR (`IdArticulo` = 1 AND (`Consecutivo` = 41 OR `Nombre` = 'XLI'))
);

-- Fracción ID 42 (Artículo 1, Fracción 'XLII', Consecutivo 42)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 42, 'XLII', 'XLII', 1, 'El listado de jubilados y pensionados y el monto que reciben', 'Listados de Jubilados y Pensionados', 42
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 42 OR (`IdArticulo` = 1 AND (`Consecutivo` = 42 OR `Nombre` = 'XLII'))
);

-- Fracción ID 43 (Artículo 1, Fracción 'XLIII', Consecutivo 43)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 43, 'XLIII', 'XLIII', 1, 'Los ingresos recibidos por cualquier concepto, señalando el nombre de los responsables de recibirlos, administrarlos y ejercerlos, así como su destino; indicando el destino de cada uno de ellos', 'Ingresos', 43
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 43 OR (`IdArticulo` = 1 AND (`Consecutivo` = 43 OR `Nombre` = 'XLIII'))
);

-- Fracción ID 44 (Artículo 1, Fracción 'XLIV', Consecutivo 44)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 44, 'XLIV', 'XLIV', 1, 'Donaciones hechas a terceros en dinero o en especie', 'Donaciones', 44
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 44 OR (`IdArticulo` = 1 AND (`Consecutivo` = 44 OR `Nombre` = 'XLIV'))
);

-- Fracción ID 45 (Artículo 1, Fracción 'XLV', Consecutivo 45)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 45, 'XLV', 'XLV', 1, 'El catálogo de disposición y guía de archivo documental ', 'Guía de Archivo Documental', 45
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 45 OR (`IdArticulo` = 1 AND (`Consecutivo` = 45 OR `Nombre` = 'XLV'))
);

-- Fracción ID 46 (Artículo 1, Fracción 'XLVI', Consecutivo 46)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 46, 'XLVI', 'XLVI', 1, 'Las actas de sesiones ordinarias y extraordinarias, así como las opiniones y recomendaciones que emitan, en su caso, los consejos consultivos', 'Las Actas de los Consejos Consultivos', 46
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 46 OR (`IdArticulo` = 1 AND (`Consecutivo` = 46 OR `Nombre` = 'XLVI'))
);

-- Fracción ID 47 (Artículo 1, Fracción 'XLVII', Consecutivo 47)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 47, 'XLVII', 'XLVII', 1, 'Para efectos estadísticos, el listado de solicitudes a las empresas concesionarias de telecomunicaciones y proveedores de servicios o aplicaciones de internet para la intervención de comunicaciones privadas, el acceso al registro de comunicaciones y la localización geográfica en tiempo real de equipos de comunicación, que contenga exclusivamente el objeto, el alcance temporal y los fundamentos legales del requerimiento, así como, en su caso, la mención que cuenta con la autorización judicial correspondiente', 'Listado de Solicitudes de Comunicaciones Privadas', 47
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 47 OR (`IdArticulo` = 1 AND (`Consecutivo` = 47 OR `Nombre` = 'XLVII'))
);

-- Fracción ID 48 (Artículo 1, Fracción 'XLVIII', Consecutivo 48)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 48, 'XLVIII', 'XLVIII', 1, 'Los acuerdos e índices de la información clasificada como reservada, en formatos abiertos', 'Indice Información Reservada', 48
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 48 OR (`IdArticulo` = 1 AND (`Consecutivo` = 48 OR `Nombre` = 'XLVIII'))
);

-- Fracción ID 49 (Artículo 1, Fracción 'XLIX', Consecutivo 49)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 49, 'XLIX', 'XLIX', 1, 'Cualquier otra información que sea de utilidad o se considere relevante, además de la que, con base en la información estadística, responda a las preguntas hechas con más frecuencia por el público.', 'Información relevante', 49
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 49 OR (`IdArticulo` = 1 AND (`Consecutivo` = 49 OR `Nombre` = 'XLIX'))
);

-- Fracción ID 51 (Artículo 2, Fracción 'II', Consecutivo 2)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 51, 'II', 'II', 2, 'Los reglamentos o disposiciones de carácter general o particular en materia municipal', 'Reglamentos Municipales', 2
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 51 OR (`IdArticulo` = 2 AND (`Consecutivo` = 2 OR `Nombre` = 'II'))
);

-- Fracción ID 52 (Artículo 2, Fracción 'III', Consecutivo 3)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 52, 'III', 'III', 2, 'Los datos referentes al servicio público de agua potable, drenaje, alcantarillado, tratamiento y disposición de aguas residuales, alumbrado público; los programas de limpia, recolección, traslado y tratamiento y disposición final de residuos; mercados y centrales de abasto, panteones, rastros, calles, parques, jardines y su equipamiento', 'Datos Servicios Públicos Municipales', 3
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 52 OR (`IdArticulo` = 2 AND (`Consecutivo` = 3 OR `Nombre` = 'III'))
);

-- Fracción ID 53 (Artículo 2, Fracción 'IV', Consecutivo 4)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 53, 'IV', 'IV', 2, 'La creación y administración de sus reservas acuíferas, territoriales y ecológicas', 'La Creación y Administración de sus reservas acuíferas, Territoriales y Ecológicas.', 4
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 53 OR (`IdArticulo` = 2 AND (`Consecutivo` = 4 OR `Nombre` = 'IV'))
);

-- Fracción ID 54 (Artículo 2, Fracción 'V', Consecutivo 5)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 54, 'V', 'V', 2, 'La formulación, aprobación y administración de la zonificación y planes de desarrollo municipal', 'Formulación, aprobación y administración de la zonificación y planes de desarrollo municipal', 5
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 54 OR (`IdArticulo` = 2 AND (`Consecutivo` = 5 OR `Nombre` = 'V'))
);

-- Fracción ID 55 (Artículo 2, Fracción 'VI', Consecutivo 6)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 55, 'VI', 'VI', 2, 'La información detallada que contengan los planes de desarrollo urbano, ordenamiento territorial y ecológico, los tipos y usos desuelo, licencias de uso y construcción otorgadas por los gobiernos municipales', 'Uso de suelo', 6
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 55 OR (`IdArticulo` = 2 AND (`Consecutivo` = 6 OR `Nombre` = 'VI'))
);

-- Fracción ID 56 (Artículo 2, Fracción 'VII', Consecutivo 7)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 56, 'VII', 'VII', 2, 'Participaciones Federales', 'Participaciones Federales', 7
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 56 OR (`IdArticulo` = 2 AND (`Consecutivo` = 7 OR `Nombre` = 'VII'))
);

-- Fracción ID 57 (Artículo 2, Fracción 'VIII', Consecutivo 8)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 57, 'VIII', 'VIII', 2, 'El catálogo de localidades y la metodología empleada para su conformación', 'Catálogo de Localidades y Metología Empleada', 8
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 57 OR (`IdArticulo` = 2 AND (`Consecutivo` = 8 OR `Nombre` = 'VIII'))
);

-- Fracción ID 58 (Artículo 2, Fracción 'IX', Consecutivo 9)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 58, 'IX', 'IX', 2, 'Las cuotas y tarifas aplicables, impuestos, derechos, contribuciones de me1jora así como las tablas de valores unitarios de suelos y construccio es que sirvan de base para el cobro de las contribuciones sobre la propiedad inmobiliaria', 'Cúotas, Tarifas, Impuestos, Derechos, Tablas de Valores Unitarios de Suelos y Construcciones', 9
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 58 OR (`IdArticulo` = 2 AND (`Consecutivo` = 9 OR `Nombre` = 'IX'))
);

-- Fracción ID 59 (Artículo 2, Fracción 'X', Consecutivo 10)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 59, 'X', 'X', 2, 'El presupuesto de egresos y las fórmulas dé distribucion de los recursos otorgados', 'Presupuesto de Egresos', 10
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 59 OR (`IdArticulo` = 2 AND (`Consecutivo` = 10 OR `Nombre` = 'X'))
);

-- Fracción ID 60 (Artículo 2, Fracción 'XI', Consecutivo 11)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 60, 'XI', 'XI', 2, 'El nombre, denominación o razón social y clave del registro federal de contribuyentes a los que se les hubiera cancelado o condonado algún crédito fiscal, así como los montos respectivos. también, la información estadística sobre las exenciones previstas en las disposiciones fiscales', 'Cancelación de Créditos fiscales', 11
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 60 OR (`IdArticulo` = 2 AND (`Consecutivo` = 11 OR `Nombre` = 'XI'))
);

-- Fracción ID 61 (Artículo 2, Fracción 'XII', Consecutivo 12)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 61, 'XII', 'XII', 2, 'Las disposiciones administrativas, directamente o a través de la autoridad competente, con el plazo dé anticipación que prevean las normas aplicables al sujeto obligado de que se trate, salvo que su difusión pueda comprometer los efectos que se pretenden lograr con la medida o se trate de situaciones de emergencia, de conformidad con dichas disposiciones', 'Disposiciones Administrativas', 12
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 61 OR (`IdArticulo` = 2 AND (`Consecutivo` = 12 OR `Nombre` = 'XII'))
);

-- Fracción ID 62 (Artículo 2, Fracción 'XIII', Consecutivo 13)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 62, 'XIII', 'XIII', 2, 'El contenido de las gacetas municipales o cualquier otro documentó por el cual se dé aviso a los ciudadanos; los cuales deberán comprender los resolutivos y acuerdos aprobados por los ayuntamientos', ' Gacetas Municipales', 13
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 62 OR (`IdArticulo` = 2 AND (`Consecutivo` = 13 OR `Nombre` = 'XIII'))
);

-- Fracción ID 63 (Artículo 2, Fracción 'XIV', Consecutivo 14)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 63, 'XIV', 'XIV', 2, 'Actas de Cabildo', 'Actas de Cabildo', 14
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 63 OR (`IdArticulo` = 2 AND (`Consecutivo` = 14 OR `Nombre` = 'XIV'))
);

-- Fracción ID 64 (Artículo 2, Fracción 'I', Consecutivo 1)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 64, 'I', 'I', 2, 'El plan municipal de desarrollo, los programas operativos anuales sectoriales, desglosado por partida, monto, obra y comunidades y las modificaciones que a los mismos se propongán.', 'Plan Municipal de Desarrollo, los Programas Operativos Anuales Sectoriales', 1
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 64 OR (`IdArticulo` = 2 AND (`Consecutivo` = 1 OR `Nombre` = 'I'))
);

-- Fracción ID 65 (Artículo 3, Fracción 'XVII', Consecutivo 17)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 65, 'XVII', 'XVII', 3, 'Pendiente', NULL, 17
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 65 OR (`IdArticulo` = 3 AND (`Consecutivo` = 17 OR `Nombre` = 'XVII'))
);

-- Fracción ID 66 (Artículo 3, Fracción 'XVIII', Consecutivo 18)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 66, 'XVIII', 'XVIII', 3, 'Pendiente', NULL, 18
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 66 OR (`IdArticulo` = 3 AND (`Consecutivo` = 18 OR `Nombre` = 'XVIII'))
);

-- Fracción ID 67 (Artículo 4, Fracción 'VI', Consecutivo 6)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 67, 'VI', 'VI', 4, 'Pendiene', NULL, 6
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 67 OR (`IdArticulo` = 4 AND (`Consecutivo` = 6 OR `Nombre` = 'VI'))
);

-- Fracción ID 68 (Artículo 3, Fracción 'XXXV', Consecutivo 35)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 68, 'XXXV', 'XXXV', 3, 'Pendiente', NULL, 35
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 68 OR (`IdArticulo` = 3 AND (`Consecutivo` = 35 OR `Nombre` = 'XXXV'))
);

-- Fracción ID 69 (Artículo 3, Fracción 'XXV', Consecutivo 25)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 69, 'XXV', 'XXV', 3, 'Pendiente', NULL, 25
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 69 OR (`IdArticulo` = 3 AND (`Consecutivo` = 25 OR `Nombre` = 'XXV'))
);

-- Fracción ID 70 (Artículo 5, Fracción 'I', Consecutivo 1)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 70, 'I', 'I', 5, 'Pendiente', NULL, 1
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 70 OR (`IdArticulo` = 5 AND (`Consecutivo` = 1 OR `Nombre` = 'I'))
);

-- Fracción ID 71 (Artículo 5, Fracción 'II', Consecutivo 2)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 71, 'II', 'II', 5, 'Pendiente', NULL, 2
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 71 OR (`IdArticulo` = 5 AND (`Consecutivo` = 2 OR `Nombre` = 'II'))
);

-- Fracción ID 72 (Artículo 5, Fracción 'III', Consecutivo 3)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 72, 'III', 'III', 5, 'Pendiente', NULL, 3
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 72 OR (`IdArticulo` = 5 AND (`Consecutivo` = 3 OR `Nombre` = 'III'))
);

-- Fracción ID 73 (Artículo 3, Fracción 'XLVI', Consecutivo 46)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 73, 'XLVI', 'XLVI', 3, 'Pendiente', NULL, 46
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 73 OR (`IdArticulo` = 3 AND (`Consecutivo` = 46 OR `Nombre` = 'XLVI'))
);

-- Fracción ID 74 (Artículo 3, Fracción 'XIV', Consecutivo 14)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 74, 'XIV', 'XIV', 3, 'Pendiente', NULL, 14
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 74 OR (`IdArticulo` = 3 AND (`Consecutivo` = 14 OR `Nombre` = 'XIV'))
);

-- Fracción ID 76 (Artículo 4, Fracción 'IX', Consecutivo 9)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 76, 'IX', 'IX', 4, 'Pendiente', NULL, 9
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 76 OR (`IdArticulo` = 4 AND (`Consecutivo` = 9 OR `Nombre` = 'IX'))
);

-- Fracción ID 77 (Artículo 3, Fracción 'XX', Consecutivo 20)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 77, 'XX', 'XX', 3, 'Pendiente', NULL, 20
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 77 OR (`IdArticulo` = 3 AND (`Consecutivo` = 20 OR `Nombre` = 'XX'))
);

-- Fracción ID 78 (Artículo 5, Fracción 'IV', Consecutivo 4)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 78, 'IV', 'IV', 5, 'Pendiente', NULL, 4
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 78 OR (`IdArticulo` = 5 AND (`Consecutivo` = 4 OR `Nombre` = 'IV'))
);

-- Fracción ID 79 (Artículo 5, Fracción 'V', Consecutivo 5)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 79, 'V', 'V', 5, 'Pendiente', NULL, 5
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 79 OR (`IdArticulo` = 5 AND (`Consecutivo` = 5 OR `Nombre` = 'V'))
);

-- Fracción ID 80 (Artículo 5, Fracción 'VI', Consecutivo 6)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 80, 'VI', 'VI', 5, 'Pendiente', NULL, 6
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 80 OR (`IdArticulo` = 5 AND (`Consecutivo` = 6 OR `Nombre` = 'VI'))
);

-- Fracción ID 81 (Artículo 5, Fracción 'VII', Consecutivo 7)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 81, 'VII', 'VII', 5, 'Pendiente', NULL, 7
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 81 OR (`IdArticulo` = 5 AND (`Consecutivo` = 7 OR `Nombre` = 'VII'))
);

-- Fracción ID 82 (Artículo 5, Fracción 'VIII', Consecutivo 8)
INSERT INTO `fraccions` (`Id`, `Nombre`, `EstructuraCarpeta`, `IdArticulo`, `Descripcion`, `Titulo`, `Consecutivo`)
SELECT 82, 'VIII', 'VIII', 5, 'PEndiente', NULL, 8
WHERE NOT EXISTS (
    SELECT 1 FROM `fraccions` WHERE `Id` = 82 OR (`IdArticulo` = 5 AND (`Consecutivo` = 8 OR `Nombre` = 'VIII'))
);

-- Confirmar transacción
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

-- =============================================================================
-- CONSULTAS DE VALIDACIÓN POST-EJECUCIÓN
-- =============================================================================
SELECT 'articulos' AS tabla, COUNT(*) AS total_registros FROM `articulos`;
SELECT 'fraccions' AS tabla, COUNT(*) AS total_registros FROM `fraccions`;
SELECT `IdArticulo`, COUNT(*) AS total_fracciones FROM `fraccions` GROUP BY `IdArticulo` ORDER BY `IdArticulo`;