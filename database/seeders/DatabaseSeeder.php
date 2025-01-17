<?php

namespace Database\Seeders;

use App\Models\Stream;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail,
        ]);

        $this->call(UsuarioInicial::class);
        $this->call(Categorias::class);
        $this->call(ProductosQA::class);
        Stream::factory()->count(200)->create();
    }
}
