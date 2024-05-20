<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TipoDocumentoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_obtener_tipos_de_documentos()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        $response = $this->get('/api/tipo/');
        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_obtener_tipos_de_documentos_por_id()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        $response = $this->get('/api/tipo/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_no_se_obtuvo_un_documento_por_id()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        $response = $this->get('/api/tipo/100');
        $response->assertStatus(404);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }
}
