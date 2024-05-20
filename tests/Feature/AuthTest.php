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
     * A basic feature test example.
     */
    public function test_usuario_puede_loguearse_con_valido_credenciales()
    {
       $user = User::factory()->create([
           'name' => 'test',
           'email' => 'test@gmail.com',
           'password' => bcrypt('test'),
       ]);

       $response = $this->post('/api/login/', [
           'email' => 'test@gmail.com',
           'password' => 'test',
       ]);

       $response->assertStatus(200);
       $response->assertJsonStructure(['message','token','user']);
    }

    public function test_usuario_no_puede_loguearse_con_incorrecto_credenciales()
    {
       $response = $this->post('/api/login/', [
           'email' => 'testFailed@gmailcom',
           'password' => 'testFail',
       ]);

       $response->assertStatus(401);
       $response->assertJsonStructure(['message']);
    }

    public function test_usuario_logout()
    {
       Sanctum::actingAs(User::factory()->create(), ['*']);
       $response = $this->get('/api/logout/');
       $response->assertStatus(200);
       $response->assertJsonStructure(['message']);
    }
}
