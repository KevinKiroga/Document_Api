<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Prueba para loguear un usuario con las credenciales validas
     */
    public function test_login_in_a_user_with_valid_credentials ()
    {
        // Esto es para crear un usuario de prueba
       $user = User::factory()->create([
           'name'     => 'test',
           'email'    => 'test@gmail.com',
           'password' => bcrypt('test'),
       ]);

       // Aqui se consume la API-POST y valida los campos para loguearse
       $response = $this->postJson('/api/login/', [
           'email'    => 'test@gmail.com',
           'password' => 'test',
       ]);

       // Si todo sale correctamente le devuelve un codigo de estado de 200
       $response->assertStatus(200);

       // Se valida y se espera la siguiente estructura del JSON
       $response->assertJsonStructure(['message','token','user']);
    }

    /**
     * Prueba para loguear un usuario con las credenciales invalidas
     */
    public function test_login_in_a_user_with_invalid_credentials ()
    {
       // Aqui se consume la API-POST y valida los campos para loguearse
       $response = $this->postJson('/api/login/', [
           'email'    => 'testFailed@gmailcom',
           'password' => 'testFail',
       ]);

       // Sino encuentra el usuario le va retornar un codigo de estado de 401
       $response->assertStatus(401);

        // Se valida y se espera la siguiente estructura del JSON
       $response->assertJsonStructure(['message']);
    }

    /**
     * Prueba para cerrar session de un usuario
     */
    public function test_logout_of_a_user ()
    {
       // Autentica el usuario de prueba y le permite acceder todos los permisos
       Sanctum::actingAs(User::factory()->create(), ['*']);

       // Aqui se consume la API-GET para cerrar session
       $response = $this->getJson('/api/logout/');

       // Le devuelve un codigo de estado 200, significa que se ejecuto correctamente
       $response->assertStatus(200);

        // Se valida y se espera la siguiente estructura del JSON
       $response->assertJsonStructure(['message']);
    }
}
