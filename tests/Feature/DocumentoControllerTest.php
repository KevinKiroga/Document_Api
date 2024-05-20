<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DocumentoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_crear_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->post('/api/documento', [
            'doc_nombre' => 'Documento test',
            'doc_contenido' => 'Contenido del documento',
            'doc_id_tipo' => 1,
            'doc_id_proceso' => 1
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_errores_en_crear_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->postJson('/api/documento', [
            'doc_contenido' => 'Contenido del documento',
            'doc_id_tipo' => 1,
            'doc_id_proceso' => 1
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message','errors']);
    }


    public function test_actualizar_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->put('/api/documento/1', [
            'doc_nombre' => 'Documento test nuevo valor',
            'doc_contenido' => 'Contenido del documento jajaj',
            'doc_id_tipo' => 1,
            'doc_id_proceso' => 1
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_errores_en_actualizar_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->putJson('/api/documento/1', [
            'doc_contenido' => 'Contenido del documento jajaj',
            'doc_idtipo' => 1,
            'doc_id_proceso' => 1
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message','errors']);
    }


    public function test_obtener_documentos()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->get('/api/documento/');

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_obtener_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->get('/api/documento/1');

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_no_se_obtuvo_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->get('/api/documento/100');
        $response->assertStatus(404);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_eliminar_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->delete('/api/documento/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }

    public function test_no_se_pudo_eliminar_un_documento()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->delete('/api/documento/100');
        $response->assertStatus(404);
        $response->assertJsonStructure(['message', 'statusCode', 'error', 'data']);
    }
}
