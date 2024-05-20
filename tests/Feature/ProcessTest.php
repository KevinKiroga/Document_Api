<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProcessTest extends TestCase
{
    /**
     * Prueba para listar todos los procesos de documentos
     */
    public function test_to_list_all_processes ()
    {
        // Autenticar el usuario de prueba y dejarlo acceder a todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para obtener todos los procesos de documentos
        $response = $this->getJson('/api/proceso/');

        // Si la API se ejecuta retornara un codigo de estado 200
        $response->assertStatus(200);

        // Comprueba que la estructura del JSON sea la similiar
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para listar todos los procesos de documentos
     */
    public function test_to_show_a_process ()
    {
        // Autenticar el usuario de prueba y dejarlo acceder a todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para obtener un proceso segun el id
        $response = $this->getJson('/api/proceso/1');

        // Si se encontro un proceso segun el id devolvera 200
        $response->assertStatus(200);

        // Comprueba que la estructura del JSON sea la similiar
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para listar todos los procesos de documentos
     */
    public function test_to_show_a_process_that_does_not_exist ()
    {
        // Autenticar el usuario de prueba y dejarlo acceder a todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para obtener un proceso segun el id
        $response = $this->getJson('/api/proceso/100');

        // Si no se encontro un proceso segun el id devolvera 404
        $response->assertStatus(404);

        // Comprueba que la estructura del JSON sea la similiar
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }
}
