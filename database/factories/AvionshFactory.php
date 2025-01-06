<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avionsh>
 */
class AvionshFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avion_id' => rand(1, 10),
            'fechaDeFabricacion' => now(),
            'img' => 'images/sh/a320_volotea.png',
            'companyia' => 'TestAirlines',
            'condicion' => 80,
        ];
    }
}
