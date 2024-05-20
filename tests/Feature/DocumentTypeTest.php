<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DocumentTypeTest extends TestCase
{
    /**
     * Prueba para listar todos los tipos de documentos
     */
    public function test_to_list_all_document_types ()
    {
        // Autentica el usuario de prueba y le permite acceder todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para listar todos los tipos de documentos
        $response = $this->getJson('/api/tipo/');

        // Devuelve un tipo de codigo de estado 200, significa que ejecuto correctamente
        $response->assertStatus(200);

        // Se valida y se espera la siguiente estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para mostrar un tipo de documento
     */
    public function test_to_show_a_document_type ()
    {
        // Autenticar el usuario de prueba y dejarlo acceder a todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para obtener un tipo de documento segun el id
        $response = $this->getJson('/api/tipo/1');

        // Si se encontro un proceso segun el id devolvera 200
        $response->assertStatus(200);

        // Comprueba que la estructura del JSON sea la similiar
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para mostrar un tipo de documento que no existe
     */
    public function test_to_show_a_document_type_that_does_not_exist ()
    {
        // Autenticar el usuario de prueba y dejarlo acceder a todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para obtener un tipo de documento segun el id
        $response = $this->getJson('/api/tipo/100');

        // Si no se encontro un proceso segun el id devolvera 404
        $response->assertStatus(404);

        // Comprueba que la estructura del JSON sea la similiar
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }
}
