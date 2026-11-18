<?php

namespace Tests\Feature;

use App\Models\Elemento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ElementoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_elementos_endpoint_returns_list(): void
    {
        Elemento::create(['NombreElemento' => 'Sección A']);
        Elemento::create(['NombreElemento' => 'Sección B']);

        $response = $this->getJson('/api/elementos');

        $response->assertOk()
                 ->assertJsonCount(2)
                 ->assertJsonFragment(['NombreElemento' => 'Sección A'])
                 ->assertJsonFragment(['NombreElemento' => 'Sección B']);
    }

    public function test_generaelemento_get_returns_list(): void
    {
        Elemento::create(['NombreElemento' => 'Catálogo General']);

        $response = $this->getJson('/api/generaelemento');

        $response->assertOk()
                 ->assertJsonCount(1)
                 ->assertJsonFragment(['NombreElemento' => 'Catálogo General']);
    }

    public function test_generaelemento_creates_record(): void
    {
        $payload = [
            'NombreElemento' => 'Auditorías Externas',
        ];

        $response = $this->postJson('/api/generaelemento', $payload);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Elemento creado correctamente',
                     'elemento' => [
                         'NombreElemento' => 'Auditorías Externas',
                     ],
                 ]);

        $this->assertDatabaseHas('elementos', [
            'NombreElemento' => 'Auditorías Externas',
        ]);
    }

    public function test_generaelemento_accepts_nombre_alias(): void
    {
        $payload = [
            'nombre' => 'Programas Sociales',
        ];

        $response = $this->postJson('/api/generaelemento', $payload);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                     'elemento' => [
                         'NombreElemento' => 'Programas Sociales',
                     ],
                 ]);

        $this->assertDatabaseHas('elementos', [
            'NombreElemento' => 'Programas Sociales',
        ]);
    }

    public function test_generaelemento_rejects_empty_name(): void
    {
        $response = $this->postJson('/api/generaelemento', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['NombreElemento']);
    }

    public function test_generaelemento_rejects_duplicate_name(): void
    {
        Elemento::create(['NombreElemento' => 'Leyes']);

        $response = $this->postJson('/api/generaelemento', [
            'NombreElemento' => 'Leyes',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['NombreElemento']);
    }

    public function test_elementos_post_alias_creates_record(): void
    {
        $response = $this->postJson('/api/elementos', [
            'NombreElemento' => 'Servicios Públicos',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'success' => true,
                     'message' => 'Elemento creado correctamente',
                 ]);

        $this->assertDatabaseHas('elementos', [
            'NombreElemento' => 'Servicios Públicos',
        ]);
    }
}
