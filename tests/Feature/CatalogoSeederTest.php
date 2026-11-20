<?php

namespace Tests\Feature;

use Database\Seeders\CatalogoArticulosFraccionesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CatalogoSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalogo_seeder_inserts_when_empty_and_does_not_duplicate_when_re_run(): void
    {
        $this->assertEquals(0, DB::table('articulos')->count());
        $this->assertEquals(0, DB::table('fraccions')->count());

        // Primera ejecución: debe insertar
        $this->seed(CatalogoArticulosFraccionesSeeder::class);

        $articulosPrimerRun = DB::table('articulos')->count();
        $fraccionesPrimerRun = DB::table('fraccions')->count();

        $this->assertGreaterThan(0, $articulosPrimerRun);
        $this->assertGreaterThan(0, $fraccionesPrimerRun);

        // Segunda ejecución: verificación si existe el elemento NO insertar
        $this->seed(CatalogoArticulosFraccionesSeeder::class);

        $this->assertEquals($articulosPrimerRun, DB::table('articulos')->count());
        $this->assertEquals($fraccionesPrimerRun, DB::table('fraccions')->count());
    }
}
