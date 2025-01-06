<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Espacio>
 */
class EspacioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'aeropuerto_id' => rand(1, 10),
            'user_id' => 1,
            'numeroDeEspacios' => rand(1, 10),
        ];
    }

    public function withUserId($userId)
    {
        return $this->state(function (array $attributes) use ($userId) {
            return [
                'aeropuerto_id' => rand(1, 10),
                'user_id' => $userId,
                'numeroDeEspacios' => rand(1, 10),
            ];
        });
    }
}
