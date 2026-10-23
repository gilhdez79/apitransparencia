<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_returns_user_data_without_password(): void
    {
        DB::table('Usuarios')->insert([
            'Usuario' => 'login-test',
            'Password' => bcrypt('secret'),
        ]);

        $response = $this->postJson('/api/login', [
            'Usuario' => 'login-test',
            'password' => 'secret',
        ]);

        $response->assertOk()
            ->assertJson([
                'message' => 'Login correcto',
                'usuario' => ['Usuario' => 'login-test'],
            ])
            ->assertJsonMissingPath('usuario.Password');
    }

    public function test_login_returns_unauthorized_for_unknown_user(): void
    {
        $response = $this->postJson('/api/login', [
            'Usuario' => 'does-not-exist',
            'password' => 'secret',
        ]);

        $response->assertUnauthorized()
            ->assertJson(['message' => 'Usuario o password incorrecto']);
    }

    public function test_login_requires_user_and_password(): void
    {
        $response = $this->postJson('/api/login', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['Usuario', 'Pasword', 'password']);
    }
}
