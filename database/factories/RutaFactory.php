<?php

namespace Database\Factories;

use App\Models\Espacio;
use App\Models\Flota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruta>
 */
class RutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flota_id' => Flota::factory()->create(),
            'user_id' => 1,
            'espacio_departure_id' => Espacio::factory()->create(),
            'espacio_arrival_id' => Espacio::factory()->create(),
            'horaInicio' => '06:00:00',
            'horaFin' => '08:00:00',
            'distancia' => '3333',
            'tiempoEstimado' => '01:00:00',
            'precioBillete' => rand(50, 600),
        ];
    }

    public function withUserId($userId)
    {
        return $this->state(function (array $attributes) use ($userId) {
            return [
                'flota_id' => Flota::factory()->create(),
                'user_id' => $userId,
                'espacio_departure_id' => Espacio::factory()->create(),
                'espacio_arrival_id' => Espacio::factory()->create(),
                'horaInicio' => '06:00:00',
                'horaFin' => '08:00:00',
                'distancia' => '3333',
                'tiempoEstimado' => '01:00:00',
                'precioBillete' => rand(50, 600),
            ];
        });
    }
}
