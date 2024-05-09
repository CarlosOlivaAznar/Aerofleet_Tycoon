<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flota>
 */
class FlotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'avion_id' => rand(1, 30),
            'matricula' => 'EC-AAA',
            'fechaDeFabricacion' => now(),
            'condicion' => 100,
            'estado' => 1,
        ];
    }
}
