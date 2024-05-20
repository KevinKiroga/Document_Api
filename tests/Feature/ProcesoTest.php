<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcesoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_obtener_procesos()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
        
        $response = $this->get('/api/proceso/');
        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_obtener_procesos_por_id()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        
        $response = $this->get('/api/proceso/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_no_se_obtuvo_un_proceso_por_id()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);
        
        $response = $this->get('/api/proceso/100');
        $response->assertStatus(404);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }
}
