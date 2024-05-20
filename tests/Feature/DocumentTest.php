<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    /**
     * Prueba para crear un documento
     */
    public function test_to_create_a_document ()
    {
        // Autentica el usuario de prueba y le permite acceder todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-POST y envia los campos correctamente
        $response = $this->postJson('/api/documento', [
            'doc_nombre'     => 'Documento test',
            'doc_contenido'  => 'Contenido del documento',
            'doc_id_tipo'    => 1,
            'doc_id_proceso' => 1
        ]); 

        // Devuelve un tipo de codigo de estado 200, significa que ejecuto correctamente
        $response->assertStatus(200);

        // Se valida y se espera la siguiente estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba de error para cear un documento
     */
    public function test_error_to_create_a_document ()
    {
        // Autentica el usuario de prueba y le permite acceder todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-POST y envia los campos incorrectamente
        $response = $this->postJson('/api/documento', [
            'doc_contenido' => 'Contenido del documento',
            'doc_id_tipo' => 1,
            'doc_id_proceso' => 1
        ]);

        // Devuelve el codigo de estado 422
        $response->assertStatus(422);

        // Compara con la del JSON de la APIS
        $response->assertJsonStructure(['message','errors']);
    }

    /**
     * Prueba para actualizar un documento
     */
    public function test_to_update_a_document ()
    {
        // Autentica el usuario de prueba y le permite acceder todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-PUT mandando el id y los campos requeridos del documento
        $response = $this->putJson('/api/documento/1', [
            'doc_nombre' => 'Documento test nuevo valor',
            'doc_contenido' => 'Contenido del documento jajaj',
            'doc_id_tipo' => 1,
            'doc_id_proceso' => 1
        ]);

        // Si la API sale bien el estado de codigo sera 200
        $response->assertStatus(200);

        // Valida la estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para actualizar un documento
     */
    public function test_error_to_update_a_document()
    {
          // Autentica el usuario de prueba y le permite acceder todos los permisos
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-PUT mandando el id y los campos incorrectos del documento
        $response = $this->putJson('/api/documento/1', [
            'doc_contenido' => 'Contenido del documento jajaj',
            'doc_idtipo' => 1,
            'doc_id_proceso' => 1
        ]);

        // Si la API sale bien el estado de codigo sera 200
        $response->assertStatus(422);

          // Valida la estructura del JSON
        $response->assertJsonStructure(['message','errors']);
    }

    /**
     * Prueba para listar todos los documentos
     */
    public function test_to_list_all_documents ()
    {
        // Auntentica el usuario de prueba y le permite acceder a todos los permisos 
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para devolver todos los documentos
        $response = $this->getJson('/api/documento/');

        // Si se consumio la API retornara un codigo de estado 200
        $response->assertStatus(200);

        // Valida la estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para mostrar un documento
     */
    public function test_to_show_a_document ()
    {
        // Auntentica el usuario de prueba y le permite acceder a todos los permisos 
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para mostrar un documento segun su id
        $response = $this->get('/api/documento/1');

        // Si se consumio la API retornara un codigo de estado 200
        $response->assertStatus(200);

         // Valida la estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para mostrar un documento que no existe
     */
    public function test_to_show_a_document_that_does_not_exit ()
    {
        // Auntentica el usuario de prueba y le permite acceder a todos los permisos 
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-GET para mostrar un documento segun su id
        $response = $this->get('/api/documento/100');

        // Si no se encontro la API retornara un codigo de estado 404
        $response->assertStatus(404);

        // Valida la estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para eliminar un documento
     */
    public function test_to_delete_a_document ()
    {
        // Auntentica el usuario de prueba y le permite acceder a todos los permisos 
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-DELETE para eliminar un documento segun su id
        $response = $this->delete('/api/documento/1');

        // Si se consumio la API retornara un codigo de estado 200
        $response->assertStatus(200);

        // Valida la estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    /**
     * Prueba para eliminar un documento que no existe
     */
    public function test_to_delete_a_document_that_does_not_exit ()
    {
        // Auntentica el usuario de prueba y le permite acceder a todos los permisos 
        Sanctum::actingAs(User::factory()->create(), ['*']);

        // Consume la API-DELETE para mostrar un documento segun su id
        $response = $this->delete('/api/documento/100');

        // Si no se encontro la API retornara un codigo de estado 404
        $response->assertStatus(404);

         // Valida la estructura del JSON
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }
}
