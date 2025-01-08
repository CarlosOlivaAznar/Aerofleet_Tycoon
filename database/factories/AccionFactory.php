<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accion>
 */
class AccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sede_id' => 2,
            'user_id' => 1,
            'accionesCompradas' => 0.05,
            'valorCompra' => 200000000,
            'beneficios' => 50000,
        ];
    }
}
