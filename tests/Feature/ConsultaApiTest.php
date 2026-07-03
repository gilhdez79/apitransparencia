<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ConsultaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_getconsulta_filters_links_with_bound_parameters(): void
    {
        DB::table('fraccions')->insert([
            ['Id' => 40, 'Nombre' => 'Fraccion A', 'Consecutivo' => 1],
            ['Id' => 41, 'Nombre' => 'Fraccion B', 'Consecutivo' => 2],
        ]);

        DB::table('trimestre')->insert([
            ['Id' => 1, 'Nombre' => 'Primer trimestre', 'NombreCorto' => 'T1'],
            ['Id' => 2, 'Nombre' => 'Segundo trimestre', 'NombreCorto' => 'T2'],
        ]);

        DB::table('datoslinks')->insert([
            [
                'ID' => 1,
                'Link' => 'https://example.test/a.pdf',
                'NombreArchivo' => 'a.pdf',
                'Annio' => 2024,
                'idArticulo' => 76,
                'IdFraccion' => 40,
                'idTrimestre' => 1,
                'Clasificacion' => 1,
            ],
            [
                'ID' => 2,
                'Link' => 'https://example.test/b.pdf',
                'NombreArchivo' => 'b.pdf',
                'Annio' => 2024,
                'idArticulo' => 76,
                'IdFraccion' => 41,
                'idTrimestre' => 2,
                'Clasificacion' => 1,
            ],
        ]);

        $response = $this->postJson('/api/getconsulta', [
            'annio' => 2024,
            'idarticulo' => 76,
            'idfraccion' => 40,
            'idtrimestre' => 1,
        ]);

        $response
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.ID', 1)
            ->assertJsonPath('0.Fraccion', 'Fraccion A')
            ->assertJsonPath('0.Trimestre', 1);
    }

    public function test_getleyes_returns_classification_eight_documents(): void
    {
        DB::table('datoslinks')->insert([
            [
                'ID' => 1,
                'Link' => 'https://example.test/ley.pdf',
                'NombreArchivo' => 'ley.pdf',
                'Annio' => 2024,
                'Clasificacion' => 8,
            ],
            [
                'ID' => 2,
                'Link' => 'https://example.test/otro.pdf',
                'NombreArchivo' => 'otro.pdf',
                'Annio' => 2024,
                'Clasificacion' => 1,
            ],
        ]);

        $response = $this->getJson('/api/getleyes');

        $response
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.ID', 1)
            ->assertJsonPath('0.Documento', 'ley.pdf');
    }
}
