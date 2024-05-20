<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Se crea un usuario de prubea con el esquema de factory
        \App\Models\User::factory()->create([
            'name'      => 'usuario', 
            'email'     => 'usuario@gmail.com',
            'password'  => bcrypt('usuario')
        ]);

        $this->call(ProcessSeeder::class);
        $this->call(DocumentTypeSeeder::class);
    }
}
