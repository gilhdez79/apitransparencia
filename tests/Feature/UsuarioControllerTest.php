<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_validarusuario_accepts_valid_credentials(): void
    {
        DB::table('Usuarios')->insert([
            'Usuario' => 'usuario-validar',
            'Nombre' => 'Usuario',
            'ApellidoP' => 'Prueba',
            'Amaterno' => 'Test',
            'Pasword' => Hash::make('password-seguro'),
            'CorreoElectronico' => 'validar@example.com',
        ]);

        $response = $this->postJson('/api/validarusuario', [
            'Usuario' => 'usuario-validar',
            'Pasword' => 'password-seguro',
        ]);

        $response->assertOk()
            ->assertJson([
                'message' => 'Usuario validado correctamente',
                'usuario' => ['Usuario' => 'usuario-validar'],
            ])
            ->assertJsonMissingPath('usuario.Pasword');
    }

    public function test_validarusuario_rejects_invalid_credentials(): void
    {
        DB::table('Usuarios')->insert([
            'Usuario' => 'usuario-validar',
            'Pasword' => Hash::make('password-correcto'),
        ]);

        $response = $this->postJson('/api/validarusuario', [
            'Usuario' => 'usuario-validar',
            'Pasword' => 'password-incorrecto',
        ]);

        $response->assertUnauthorized()
            ->assertJson(['message' => 'Usuario o password incorrecto']);
    }

    public function test_validarusuario_requires_username_and_password(): void
    {
        $response = $this->postJson('/api/validarusuario', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['Usuario', 'Pasword']);
    }

    public function test_it_creates_a_user_with_a_hashed_password(): void
    {
        $response = $this->postJson('/api/usuarios', [
            'Usuario' => 'nuevo-usuario',
            'Nombre' => 'Nuevo',
            'ApellidoP' => 'Usuario',
            'Amaterno' => 'Prueba',
            'Pasword' => 'password-seguro',
            'CorreoElectronico' => 'nuevo@example.com',
        ]);

        $response->assertCreated()
            ->assertJson([
            'message' => 'Usuario creado correctamente',
            'usuario' => ['Usuario' => 'nuevo-usuario'],
            ])
            ->assertJsonMissingPath('usuario.password');

        $usuario = DB::table('Usuarios')
            ->where('Usuario', 'nuevo-usuario')
            ->first();

        $this->assertNotNull($usuario);
        $this->assertSame('Nuevo', $usuario->Nombre);
        $this->assertTrue(Hash::check('password-seguro', $usuario->Pasword));
        $this->assertNotSame('password-seguro', $usuario->Pasword);
    }

    public function test_registrarusuario_endpoint_creates_a_user(): void
    {
        $response = $this->postJson('/api/registrarusuario', [
            'Usuario' => 'usuario-registrado',
            'Nombre' => 'Usuario',
            'ApellidoP' => 'Registrado',
            'Amaterno' => 'Prueba',
            'Pasword' => 'password-seguro',
            'CorreoElectronico' => 'registrado@example.com',
        ]);

        $response->assertCreated()
            ->assertJson([
                'message' => 'Usuario creado correctamente',
                'usuario' => ['Usuario' => 'usuario-registrado'],
            ]);

        $this->assertDatabaseHas('Usuarios', [
            'Usuario' => 'usuario-registrado',
        ]);
    }

    public function test_it_rejects_duplicate_usernames(): void
    {
        DB::table('Usuarios')->insert([
            'Usuario' => 'usuario-existente',
            'Password' => Hash::make('password-seguro'),
        ]);

        $response = $this->postJson('/api/usuarios', [
            'Usuario' => 'usuario-existente',
            'Nombre' => 'Otro',
            'ApellidoP' => 'Usuario',
            'Amaterno' => 'Prueba',
            'Pasword' => 'otra-password',
            'CorreoElectronico' => 'otro@example.com',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['Usuario']);
    }

    public function test_it_requires_a_username_and_password(): void
    {
        $response = $this->postJson('/api/usuarios', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors([
                'Usuario',
                'Nombre',
                'ApellidoP',
                'Amaterno',
                'Pasword',
                'CorreoElectronico',
            ]);
    }
}
