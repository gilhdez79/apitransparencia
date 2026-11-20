<?php

namespace Tests\Feature;

use App\Models\ElementoClase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ElementoClaseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_elementosclase_endpoint_returns_empty_list_when_no_records(): void
    {
        $response = $this->getJson('/api/elementosclase');

        $response->assertOk()
                 ->assertJson([]);
    }

    public function test_elementosclase_endpoint_returns_list_of_clases(): void
    {
        ElementoClase::create(['Clase' => 'A']);
        ElementoClase::create(['Clase' => 'B']);
        ElementoClase::create(['Clase' => 'C']);

        $response = $this->getJson('/api/elementosclase');

        $response->assertOk()
                 ->assertJsonCount(3)
                 ->assertJsonFragment(['Clase' => 'A'])
                 ->assertJsonFragment(['Clase' => 'B'])
                 ->assertJsonFragment(['Clase' => 'C']);
    }
}
