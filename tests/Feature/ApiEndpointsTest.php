<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class ApiEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_test_endpoint_returns_success(): void
    {
        $response = $this->getJson('/api/test');

        $response->assertOk()
                 ->assertJson(['msg' => 'Mi primer Respuesta de API']);
    }

    public function test_fracciones_endpoint_returns_list(): void
    {
        DB::table('fraccions')->insert([
            ['Id' => 1, 'Nombre' => 'Fraccion 1', 'Consecutivo' => 1],
            ['Id' => 2, 'Nombre' => 'Fraccion 2', 'Consecutivo' => 2],
        ]);

        $response = $this->getJson('/api/fracciones');

        $response->assertOk()
                 ->assertJsonCount(2);
    }

    public function test_articulos_endpoint_returns_list(): void
    {
        DB::table('articulos')->insert([
            ['Id' => 1, 'Nombre' => 'Articulo 1'],
            ['Id' => 2, 'Nombre' => 'Articulo 2'],
        ]);

        $response = $this->getJson('/api/articulos');

        $response->assertOk()
                 ->assertJsonCount(2);
    }

    public function test_consulta_endpoint_returns_empty_list_by_default(): void
    {
        $response = $this->getJson('/api/consulta');

        $response->assertOk()
                 ->assertJson([]);
    }

    public function test_registrar_link_creates_record(): void
    {
        $data = [
            'link' => 'https://example.com/test.pdf',
            'nombrearchivo' => 'test.pdf',
            'annio' => 2024,
            'idarticulo' => 1,
            'idfraccion' => 1,
            'idtrimestre' => 1,
            'clasificacion' => 1,
        ];

        $response = $this->postJson('/api/registrar', $data);

        $response->assertOk()
                 ->assertJson(['message' => 'Se ha guardado correctamente']);

        $this->assertDatabaseHas('datoslinks', [
            'Link' => 'https://example.com/test.pdf',
            'NombreArchivo' => 'test.pdf',
            'Annio' => 2024,
            'idArticulo' => 1,
            'IdFraccion' => 1,
            'idTrimestre' => 1,
            'Clasificacion' => 1,
        ]);
    }

    public function test_getestrados_returns_list(): void
    {
        DB::table('tipoestrados')->insert(['Id' => 1, 'Nombre' => 'Tipo 1']);
        DB::table('ponencia')->insert(['Id' => 1, 'Nombre' => 'Ponencia 1']);
        DB::table('estrados')->insert([
            'IdTipoestrado' => 1,
            'IdPonencia' => 1,
            'fecha' => '2024-01-01',
            'nombrearchivo' => 'archivo.pdf'
        ]);

        $response = $this->getJson('/api/getestrados');

        $response->assertOk()
                 ->assertJsonCount(1)
                 ->assertJsonPath('0.Estrado', 'Tipo 1')
                 ->assertJsonPath('0.ponencia', 'Ponencia 1');
    }

    public function test_registrarestrado_creates_record(): void
    {
        $data = [
            'idtipoestrado' => 1,
            'idponencia' => 1,
            'fecha' => '2024-01-01',
            'nombrearchivo' => 'archivo.pdf'
        ];

        $response = $this->postJson('/api/registrarestrado', $data);

        $response->assertOk()
                 ->assertJson(['message' => 'Se ha guardado correctamente']);

        $this->assertDatabaseHas('estrados', [
            'idtipoestrado' => 1,
            'idponencia' => 1,
            'fecha' => '2024-01-01',
            'nombrearchivo' => 'archivo.pdf'
        ]);
    }

    public function test_login_with_correct_credentials_returns_success(): void
    {
        $password = 'password123';
        DB::table('Usuarios')->insert([
            'Usuario' => 'testuser',
            'Password' => bcrypt($password),
        ]);

        $response = $this->postJson('/api/login', [
            'Usuario' => 'testuser',
            'password' => $password,
        ]);

        $response->assertOk()
                 ->assertJson(['message' => 'Login correcto']);
    }

    public function test_login_with_incorrect_credentials_returns_unauthorized(): void
    {
        DB::table('Usuarios')->insert([
            'Usuario' => 'testuser',
            'Password' => bcrypt('correct_password'),
        ]);

        $response = $this->postJson('/api/login', [
            'Usuario' => 'testuser',
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(401)
                 ->assertJson(['message' => 'Usuario o password incorrecto']);
    }
}
