<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StreamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name,
            'imagen' => "/images/productos/1611518819.png",
            'estado' => 1,
            'url' => fake()->url,
            'publication_date' => date("YmdHis")
        ];
    }
}
